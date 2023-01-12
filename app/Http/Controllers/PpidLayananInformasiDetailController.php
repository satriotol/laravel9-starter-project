<?php

namespace App\Http\Controllers;

use App\Models\PpidLayananInformasiDetail;
use Illuminate\Http\Request;

class PpidLayananInformasiDetailController extends Controller
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
     * @param  \App\Models\PpidLayananInformasiDetail  $ppidLayananInformasiDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PpidLayananInformasiDetail $ppidLayananInformasiDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidLayananInformasiDetail  $ppidLayananInformasiDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidLayananInformasiDetail $ppidLayananInformasiDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidLayananInformasiDetail  $ppidLayananInformasiDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidLayananInformasiDetail $ppidLayananInformasiDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidLayananInformasiDetail  $ppidLayananInformasiDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidLayananInformasiDetail $ppidLayananInformasiDetail)
    {
        $ppidLayananInformasiDetail->delete();
        session()->flash('success');
        return back();
    }
}
