<?php

namespace App\Http\Controllers;

use App\Models\PpidInfopublicFile;
use Illuminate\Http\Request;

class PpidInfopublicFileController extends Controller
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
     * @param  \App\Models\PpidInfopublicFile  $ppidInfopublicFile
     * @return \Illuminate\Http\Response
     */
    public function show(PpidInfopublicFile $ppidInfopublicFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidInfopublicFile  $ppidInfopublicFile
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidInfopublicFile $ppidInfopublicFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidInfopublicFile  $ppidInfopublicFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidInfopublicFile $ppidInfopublicFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidInfopublicFile  $ppidInfopublicFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidInfopublicFile $ppidInfopublicFile)
    {
        $ppidInfopublicFile->delete();
        session()->flash('success');
        return back();
    }
}
