<?php

namespace App\Http\Controllers;

use App\Models\WbsAbout;
use Illuminate\Http\Request;

class WbsAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:wbsAbout-index|wbsAbout-create|wbsAbout-edit|wbsAbout-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:wbsAbout-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:wbsAbout-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:wbsAbout-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $wbsAbout = WbsAbout::first();
        if ($wbsAbout) {
            return view('backend.wbsAbout.create', compact('wbsAbout'));
        }
        return view('backend.wbsAbout.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wbsAbout.create');
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
            'description' => 'required',
        ]);
        WbsAbout::create($data);
        session()->flash('success');
        return redirect(route('wbsAbout.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WbsAbout  $wbsAbout
     * @return \Illuminate\Http\Response
     */
    public function show(WbsAbout $wbsAbout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WbsAbout  $wbsAbout
     * @return \Illuminate\Http\Response
     */
    public function edit(WbsAbout $wbsAbout)
    {
        return view('backend.wbsAbout.create', compact('wbsAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WbsAbout  $wbsAbout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WbsAbout $wbsAbout)
    {
        $data = $request->validate([
            'description' => 'required',
        ]);

        $wbsAbout->update($data);
        session()->flash('success');
        return redirect(route('wbsAbout.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WbsAbout  $wbsAbout
     * @return \Illuminate\Http\Response
     */
    public function destroy(WbsAbout $wbsAbout)
    {
        $wbsAbout->delete();
        session()->flash('success');
        return redirect(route('wbsAbout.index'));
    }
}
