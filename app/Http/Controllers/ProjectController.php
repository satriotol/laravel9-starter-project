<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\Type;
use App\Models\User;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-index|project-create|project-edit|project-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $projects = Project::paginate();
        return view('backend.project.index', compact('projects'));
    }
    public function create()
    {
        $types = Type::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('backend.project.create', compact('types', 'users'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'url' => 'required',
            'start_at' => 'required|date',
            'user_id' => 'required',
        ]);
        $project = Project::create($data);
        $project->users()->attach($data['user_id']);
        session()->flash('success');
        return redirect(route('project.index'));
    }
    public function edit(Project $project)
    {
        $types = Type::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('backend.project.create', compact('project', 'types', 'users'));
    }
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'url' => 'required',
            'start_at' => 'required|date',
            'user_id' => 'required',
        ]);
        $project->update($data);
        $project->users()->sync($data['user_id']);
        session()->flash('success');
        return redirect(route('project.index'));
    }
    public function destroy(Project $project)
    {
        $project->delete();
        session()->flash('success');
        return back();
    }
}
