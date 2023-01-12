<?php

namespace App\Http\Controllers;

use App\Models\BeritaCategoryGallery;
use Illuminate\Http\Request;

class BeritaCategoryGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaCategoryGallery  $beritaCategoryGallery
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaCategoryGallery $beritaCategoryGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaCategoryGallery  $beritaCategoryGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaCategoryGallery $beritaCategoryGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaCategoryGallery  $beritaCategoryGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaCategoryGallery $beritaCategoryGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaCategoryGallery  $beritaCategoryGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaCategoryGallery $beritaCategoryGallery)
    {
        $beritaCategoryGallery->delete();
        session()->flash('success');
        return back();
    }
}
