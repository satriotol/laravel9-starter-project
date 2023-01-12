<?php

namespace App\Http\Controllers;

use App\Models\WbsBeranda;
use Illuminate\Http\Request;

class WbsBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wbsBeranda = WbsBeranda::first();
        if ($wbsBeranda) {
            return view('backend.wbsBeranda.create', compact('wbsBeranda'));
        }
        return view('backend.wbsBeranda.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wbsBeranda.create');
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
        WbsBeranda::create($data);
        session()->flash('success');
        return redirect(route('wbsBeranda.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WbsBeranda  $wbsBeranda
     * @return \Illuminate\Http\Response
     */
    public function show(WbsBeranda $wbsBeranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WbsBeranda  $wbsBeranda
     * @return \Illuminate\Http\Response
     */
    public function edit(WbsBeranda $wbsBeranda)
    {
        return view('backend.wbsBeranda.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WbsBeranda  $wbsBeranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WbsBeranda $wbsBeranda)
    {
        $data = $request->validate([
            'description' => 'required',
        ]);
        $wbsBeranda->update($data);
        session()->flash('success');
        return redirect(route('wbsBeranda.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WbsBeranda  $wbsBeranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(WbsBeranda $wbsBeranda)
    {
        $wbsBeranda->delete();
        session()->flash('success');
        return redirect(route('wbsBeranda.index'));
    }
}
