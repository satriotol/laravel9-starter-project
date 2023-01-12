<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:tema-index|tema-create|tema-edit|tema-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:tema-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tema-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tema-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $temas = Tema::all();
        return view('backend.tema.index', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tema.create');
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
        ]);
        Tema::create($data);
        session()->flash('success');
        return redirect(route('tema.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        return view('backend.tema.create', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $tema->update($data);
        session()->flash('success');
        return redirect(route('tema.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        session()->flash('success');
        return redirect(route('tema.index'));
    }
}
