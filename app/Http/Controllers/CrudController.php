<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Crud;

class CrudController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:crud-index|crud-create|crud-edit|crud-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:crud-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:crud-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
    // }
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
            'singluar' => 'required|unique:cruds,singular',
        ]);
        Crud::create($data);
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
