<?php

namespace App\Http\Controllers;

use App\Models\UpgCategory;
use Illuminate\Http\Request;

class UpgCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:upgCategory-index|upgCategory-create|upgCategory-edit|upgCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:upgCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:upgCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:upgCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $upgCategories = UpgCategory::all();
        return view('backend.upgCategory.index', compact('upgCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.upgCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        UpgCategory::create($data);
        session()->flash('success');
        return redirect(route('upgCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpgCategory  $upgCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UpgCategory $upgCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpgCategory  $upgCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UpgCategory $upgCategory)
    {
        return view('backend.upgCategory.create', compact('upgCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpgCategory  $upgCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpgCategory $upgCategory)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $upgCategory->update($data);
        session()->flash('success');
        return redirect(route('upgCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpgCategory  $upgCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpgCategory $upgCategory)
    {
        $upgCategory->delete();
        session()->flash('success');
        return redirect(route('upgCategory.index'));
    }
}
