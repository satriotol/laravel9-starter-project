<?php

namespace App\Http\Controllers;

use App\Models\KonsistenStep;
use Illuminate\Http\Request;

class KonsistenStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:konsistenStep-index|konsistenStep-create|konsistenStep-edit|konsistenStep-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:konsistenStep-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:konsistenStep-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:konsistenStep-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $konsistenSteps = KonsistenStep::all();
        return view('backend.konsistenStep.index', compact('konsistenSteps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.konsistenStep.create');
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
            'number' => 'required',
            'description' => 'required',
        ]);
        KonsistenStep::create($data);
        session()->flash('success');
        return redirect(route('konsistenStep.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonsistenStep  $konsistenStep
     * @return \Illuminate\Http\Response
     */
    public function show(KonsistenStep $konsistenStep)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonsistenStep  $konsistenStep
     * @return \Illuminate\Http\Response
     */
    public function edit(KonsistenStep $konsistenStep)
    {
        return view('backend.konsistenStep.create', compact('konsistenStep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonsistenStep  $konsistenStep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonsistenStep $konsistenStep)
    {
        $data = $request->validate([
            'number' => 'required',
            'description' => 'required'
        ]);

        $konsistenStep->update($data);
        session()->flash('success');
        return redirect(route('konsistenStep.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonsistenStep  $konsistenStep
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonsistenStep $konsistenStep)
    {
        $konsistenStep->delete();
        session()->flash('success');
        return redirect(route('konsistenStep.index'));
    }
}
