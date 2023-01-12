<?php

namespace App\Http\Controllers;

use App\Models\UpgStep;
use Illuminate\Http\Request;

class UpgStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:upgStep-index|upgStep-create|upgStep-edit|upgStep-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:upgStep-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:upgStep-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:upgStep-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $upgSteps = UpgStep::all();
        return view('backend.upgStep.index', compact('upgSteps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.upgStep.create');
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
        UpgStep::create($data);
        session()->flash('success');
        return redirect(route('upgStep.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpgStep  $upgStep
     * @return \Illuminate\Http\Response
     */
    public function show(UpgStep $upgStep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpgStep  $upgStep
     * @return \Illuminate\Http\Response
     */
    public function edit(UpgStep $upgStep)
    {
        return view('backend.upgStep.create', compact('upgStep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpgStep  $upgStep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpgStep $upgStep)
    {
        $data = $request->validate([
            'number' => 'required',
            'description' => 'required'
        ]);

        $upgStep->update($data);
        session()->flash('success');
        return redirect(route('upgStep.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpgStep  $upgStep
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpgStep $upgStep)
    {
        $upgStep->delete();
        session()->flash('success');
        return redirect(route('upgStep.index'));
    }
}
