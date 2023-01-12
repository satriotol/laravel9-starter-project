<?php

namespace App\Http\Controllers;

use App\Models\WbsCategory;
use Illuminate\Http\Request;

class WbsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:wbsCategory-index|wbsCategory-create|wbsCategory-edit|wbsCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:wbsCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:wbsCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:wbsCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $wbsCategories = WbsCategory::all();
        return view('backend.wbsCategory.index', compact('wbsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wbsCategory.create');
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
        WbsCategory::create($data);
        session()->flash('success');
        return redirect(route('wbsCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WbsCategory  $wbsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(WbsCategory $wbsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WbsCategory  $wbsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(WbsCategory $wbsCategory)
    {
        return view('backend.wbsCategory.create', compact('wbsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WbsCategory  $wbsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WbsCategory $wbsCategory)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $wbsCategory->update($data);
        session()->flash('success');
        return redirect(route('wbsCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WbsCategory  $wbsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WbsCategory $wbsCategory)
    {
        $wbsCategory->delete();
        session()->flash('success');
        return redirect(route('wbsCategory.index'));
    }
}
