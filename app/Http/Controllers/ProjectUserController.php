<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectUser;

class ProjectUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project_user-index|project_user-create|project_user-edit|project_user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:project_user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project_user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project_user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $project_users = ProjectUser::paginate();
        return view('backend.project_user.index',compact('project_users'));
    }
    public function create()
    {
        return view('backend.project_user.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([

        ]);
        ProjectUser::create($data);
        session()->flash('success');
        return redirect(route('project_user.index'));
    }
    public function edit(ProjectUser $project_user)
    {
        return view('backend.project_user.create', compact('project_user'));
    }
    public function update(Request $request, ProjectUser $project_user)
    {
        $data = $request->validate([
        ]);
        $project_user->update($data);
        session()->flash('success');
        return redirect(route('project_user.index'));
    }
    public function destroy(ProjectUser $project_user)
    {
        $project_user->delete();
        session()->flash('success');
        return back();
    }
}