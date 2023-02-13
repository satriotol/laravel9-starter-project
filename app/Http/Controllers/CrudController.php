<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Crud;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:crud-index|crud-create|crud-edit|crud-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:crud-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:crud-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
    }

    public function generateModel($data)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}', '{{modelNamePlural}}'],
            [$data['model'], $data['plural']],
            file_get_contents(resource_path("stubs/Model.stub"))
        );
        file_put_contents(app_path("/Models/{$data['model']}.php"), $modelTemplate);
    }
    public function generateController($data)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePlural}}',
                '{{modelNameSingular}}'
            ],
            [
                $data['model'],
                $data['plural'],
                $data['singular']
            ],
            file_get_contents(resource_path("stubs/Controller.stub"))
        );
        file_put_contents(app_path("/Http/Controllers/{$data['model']}Controller.php"), $controllerTemplate);
    }
    public function viewIndex($data)
    {
        $indexTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePlural}}',
                '{{modelNameSingular}}'
            ],
            [
                $data['model'],
                $data['plural'],
                $data['singular'],
            ],
            file_get_contents(resource_path("stubs/viewIndex.stub"))
        );
        if (!file_exists(resource_path("/views/backend/" . $data['singular']))) {
            mkdir(resource_path("/views/backend/" . $data['singular']));
        }
        file_put_contents(resource_path("/views/backend/{$data['model']}/index.blade.php"), $indexTemplate);
    }
    public function viewCreate($data)
    {
        $createTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePlural}}',
                '{{modelNameSingular}}'
            ],
            [
                $data['model'],
                $data['plural'],
                $data['singular'],
            ],
            file_get_contents(resource_path("stubs/viewCreate.stub"))
        );
        if (!file_exists(resource_path("/views/backend/" . $data['singular']))) {
            mkdir(resource_path("/views/backend/" . $data['singular']));
        }
        file_put_contents(resource_path("/views/backend/{$data['model']}/create.blade.php"), $createTemplate);
    }
    protected function storePermission($data)
    {
        $datas = [
            '-index', '-create', '-edit', '-delete'
        ];
        foreach ($datas as $d) {
            Permission::updateOrCreate(
                [
                    'name' => $data['singular'] . $d,
                ],
                [
                    'guard_name' => 'web'
                ]
            );
        }
    }
    protected function addRoute($data)
    {
        $routeFile = base_path('routes/web.php');
        $route = "\nRoute::resource('" . $data['singular'] . "', " . $data['model'] . "Controller::class);";
        $urlRoute = "\n" . 'use App\Http\Controllers\\' . $data['model'] . "Controller;";
        $after = '// CRUD_GENERATOR';
        $after_url = '// URL_CRUD_GENERATOR';
        if ($after) {
            $contents = file_get_contents($routeFile);
            $line = strpos($contents, $after);

            if ($line !== false) {
                $line += strlen($after) + 1;
                $contents = substr_replace($contents, $route, $line, 0);
                File::put($routeFile, $contents);
            } else {
                File::append($routeFile, $route);
            }
        } else {
            File::append($routeFile, $route);
        }
        if ($after_url) {
            $contents = file_get_contents($routeFile);
            $line = strpos($contents, $after_url);

            if ($line !== false) {
                $line += strlen($after_url) + 1;
                $contents = substr_replace($contents, $urlRoute, $line, 0);
                File::put($routeFile, $contents);
            } else {
                File::append($routeFile, $urlRoute);
            }
        } else {
            File::append($routeFile, $urlRoute);
        }
    }
    public function index()
    {
        $cruds = Crud::paginate();
        return view('backend.crud.index', compact('cruds'));
    }
    public function create()
    {
        return view('backend.crud.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|unique:cruds,model',
            'plural' => 'required|unique:cruds,plural',
            'singular' => 'required|unique:cruds,singular',
        ]);
        Crud::create($data);
        $this->generateModel($data);
        $this->generateController($data);
        $this->viewIndex($data);
        $this->viewCreate($data);
        $this->storePermission($data);
        $this->addRoute($data);
        session()->flash('success');
        return redirect(route('crud.index'));
    }
    public function edit(Crud $crud)
    {
        return view('backend.crud.create', compact('crud'));
    }
    public function update(Request $request, Crud $crud)
    {
        $data = $request->validate([]);
        $crud->update($data);
        session()->flash('success');
        return redirect(route('crud.index'));
    }
    public function destroy(Crud $crud)
    {
        $crud->delete();
        session()->flash('success');
        return back();
    }
}
