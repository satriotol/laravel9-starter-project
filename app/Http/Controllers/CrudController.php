<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Crud;
use App\Traits\CrudFunction;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;

class CrudController extends Controller
{
    use CrudFunction;
    public function __construct()
    {
        $this->middleware('permission:crud-index|crud-create|crud-edit|crud-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:crud-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:crud-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cruds = Crud::paginate();
        return view('backend.crud.index', compact('cruds'));
    }
    public function create()
    {
        $types = [
            'string',
            'longText',
            'unsignedBigInteger',
            'date'
        ];
        return view('backend.crud.create', compact('types'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|unique:cruds,model',
            'plural' => 'required|unique:cruds,plural',
            'singular' => 'required|unique:cruds,singular',
            'tables' => 'required',
        ]);
        Crud::create($data);
        $this->createMigration($data);
        $this->generateModel($data);
        $this->generateModel($data);
        $this->generateController($data);
        $this->viewIndex($data);
        $this->viewCreate($data);
        $this->addRoute($data);
        $this->storePermission($data);
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
