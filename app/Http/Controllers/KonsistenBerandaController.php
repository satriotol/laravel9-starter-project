<?php

namespace App\Http\Controllers;

use App\Models\KonsistenBeranda;
use Illuminate\Http\Request;

class KonsistenBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:konsistenBeranda-index|konsistenBeranda-create|konsistenBeranda-edit|konsistenBeranda-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:konsistenBeranda-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:konsistenBeranda-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:konsistenBeranda-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $konsistenBeranda = KonsistenBeranda::first();
        if ($konsistenBeranda) {
            return view('backend.konsistenBeranda.create', compact('konsistenBeranda'));
        }
        return view('backend.konsistenBeranda.create');
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
        $data = $request->validate([
            'about' => 'required',
            'description' => 'required',
        ]);
        KonsistenBeranda::create($data);
        session()->flash('success');
        return redirect(route('konsistenBeranda.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonsistenBeranda  $konsistenBeranda
     * @return \Illuminate\Http\Response
     */
    public function show(KonsistenBeranda $konsistenBeranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonsistenBeranda  $konsistenBeranda
     * @return \Illuminate\Http\Response
     */
    public function edit(KonsistenBeranda $konsistenBeranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonsistenBeranda  $konsistenBeranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonsistenBeranda $konsistenBeranda)
    {
        $data = $request->validate([
            'about' => 'required',
            'description' => 'required',
        ]);
        $konsistenBeranda->update($data);
        session()->flash('success');
        return redirect(route('konsistenBeranda.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonsistenBeranda  $konsistenBeranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonsistenBeranda $konsistenBeranda)
    {
        //
    }
}
