<?php

namespace App\Http\Controllers;

use App\Models\WbsStep;
use Illuminate\Http\Request;

class WbsStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:wbsStep-index|wbsStep-create|wbsStep-edit|wbsStep-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:wbsStep-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:wbsStep-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:wbsStep-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $wbsSteps = WbsStep::all();
        return view('backend.wbsStep.index', compact('wbsSteps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wbsStep.create');
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
        WbsStep::create($data);
        session()->flash('success');
        return redirect(route('wbsStep.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WbsStep  $wbsStep
     * @return \Illuminate\Http\Response
     */
    public function show(WbsStep $wbsStep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WbsStep  $wbsStep
     * @return \Illuminate\Http\Response
     */
    public function edit(WbsStep $wbsStep)
    {
        return view('backend.wbsStep.create', compact('wbsStep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WbsStep  $wbsStep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WbsStep $wbsStep)
    {
        $data = $request->validate([
            'number' => 'required',
            'description' => 'required'
        ]);

        $wbsStep->update($data);
        session()->flash('success');
        return redirect(route('wbsStep.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WbsStep  $wbsStep
     * @return \Illuminate\Http\Response
     */
    public function destroy(WbsStep $wbsStep)
    {
        $wbsStep->delete();
        session()->flash('success');
        return redirect(route('wbsStep.index'));
    }
}
