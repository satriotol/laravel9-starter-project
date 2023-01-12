<?php

namespace App\Http\Controllers;
use App\Models\KebijakanStatus;

use Illuminate\Http\Request;

class KebijakanStatusController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:kebijakanStatus-index|kebijakanStatus-create|kebijakanStatus-edit|kebijakanStatus-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:kebijakanStatus-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kebijakanStatus-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kebijakanStatus-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $kebijakanStatuses = KebijakanStatus::all();
        return view('backend.kebijakanStatus.index', compact('kebijakanStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kebijakanStatus.create');
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
            'name' => 'required',
            'color' => 'required'
        ]);
        KebijakanStatus::create($data);
        session()->flash('success');
        return redirect(route('kebijakanStatus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KebijakanStatus  $kebijakanStatus
     * @return \Illuminate\Http\Response
     */
    public function show(KebijakanStatus $kebijakanStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KebijakanStatus  $kebijakanStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(KebijakanStatus $kebijakanStatus)
    {
        return view('backend.kebijakanStatus.create', compact('kebijakanStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KebijakanStatus  $kebijakanStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KebijakanStatus $kebijakanStatus)
    {
        $data = $request->validate([
            'name'  => 'required',
            'color' => 'required'
        ]);
        $kebijakanStatus->update($data);
        session()->flash('success');
        return redirect(route('kebijakanStatus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KebijakanStatus  $kebijakanStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(KebijakanStatus $kebijakanStatus)
    {
        $kebijakanStatus->delete();
        session()->flash('success');
        return redirect(route('kebijakanStatus.index'));
    }
}
