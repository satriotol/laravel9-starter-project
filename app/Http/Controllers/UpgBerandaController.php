<?php

namespace App\Http\Controllers;

use App\Models\UpgBeranda;
use Illuminate\Http\Request;

class UpgBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:upgBeranda-index|upgBeranda-create|upgBeranda-edit|upgBeranda-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:upgBeranda-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:upgBeranda-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:upgBeranda-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $upgBeranda = UpgBeranda::first();
        if ($upgBeranda) {
            return view('backend.upgBeranda.create', compact('upgBeranda'));
        }
        return view('backend.upgBeranda.create');
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
            'about' => 'required',
        ]);
        UpgBeranda::create($data);
        session()->flash('success');
        return redirect(route('upgBeranda.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpgBeranda  $upgBeranda
     * @return \Illuminate\Http\Response
     */
    public function show(UpgBeranda $upgBeranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpgBeranda  $upgBeranda
     * @return \Illuminate\Http\Response
     */
    public function edit(UpgBeranda $upgBeranda)
    {
        return view('backend.upgBeranda.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpgBeranda  $upgBeranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpgBeranda $upgBeranda)
    {
        $data = $request->validate([
            'description' => 'required',
            'about' => 'required',
        ]);
        $upgBeranda->update($data);
        session()->flash('success');
        return redirect(route('upgBeranda.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpgBeranda  $upgBeranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpgBeranda $upgBeranda)
    {
        //
    }
}
