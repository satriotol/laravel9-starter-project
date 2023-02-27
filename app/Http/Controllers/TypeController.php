<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:type-index|type-create|type-edit|type-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:type-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:type-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:type-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $types = Type::paginate();
        return view('backend.type.index', compact('types'));
    }
    public function create()
    {
        return view('backend.type.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        Type::create($data);
        session()->flash('success');
        return redirect(route('type.index'));
    }
    public function edit(Type $type)
    {
        return view('backend.type.create', compact('type'));
    }
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $type->update($data);
        session()->flash('success');
        return redirect(route('type.index'));
    }
    public function destroy(Type $type)
    {
        $type->delete();
        session()->flash('success');
        return back();
    }
}
