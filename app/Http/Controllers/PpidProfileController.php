<?php

namespace App\Http\Controllers;

use App\Models\PpidProfile;
use Illuminate\Http\Request;

class PpidProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:ppidProfile-index|ppidProfile-create|ppidProfile-edit|ppidProfile-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:ppidProfile-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ppidProfile-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ppidProfile-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $ppidProfile = PpidProfile::all()->first();
        if ($ppidProfile) {
            return view('backend.ppidProfile.create', compact('ppidProfile'));
        }
        return view('backend.ppidProfile.create');
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
            'description'        => 'required',
        ]);
        PpidProfile::create($data);
        session()->flash('success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpidProfile  $ppidProfile
     * @return \Illuminate\Http\Response
     */
    public function show(PpidProfile $ppidProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidProfile  $ppidProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidProfile $ppidProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidProfile  $ppidProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidProfile $ppidProfile)
    {
        $data = $request->validate([
            'description'        => 'required',
        ]);
        $ppidProfile->update($data);
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidProfile  $ppidProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidProfile $ppidProfile)
    {
        //
    }
}
