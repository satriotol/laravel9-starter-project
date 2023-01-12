<?php

namespace App\Http\Controllers;

use App\Models\KebijakanCategory;
use Illuminate\Http\Request;

class KebijakanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:kebijakanCategory-index|kebijakanCategory-create|kebijakanCategory-edit|kebijakanCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:kebijakanCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kebijakanCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kebijakanCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $kebijakanCategories = KebijakanCategory::all();
        return view('backend.kebijakanCategory.index', compact('kebijakanCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kebijakanCategory.create');
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
        KebijakanCategory::create($data);
        session()->flash('success');
        return redirect(route('kebijakanCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KebijakanCategory  $kebijakanCategory
     * @return \Illuminate\Http\Response
     */
    public function show(KebijakanCategory $kebijakanCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KebijakanCategory  $kebijakanCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(KebijakanCategory $kebijakanCategory)
    {
        return view('backend.kebijakanCategory.create', compact('kebijakanCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KebijakanCategory  $kebijakanCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KebijakanCategory $kebijakanCategory)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $kebijakanCategory->update($data);
        session()->flash('success');
        return redirect(route('kebijakanCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KebijakanCategory  $kebijakanCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(KebijakanCategory $kebijakanCategory)
    {
        $kebijakanCategory->delete();
        session()->flash('success');
        return redirect(route('kebijakanCategory.index'));
    }
}
