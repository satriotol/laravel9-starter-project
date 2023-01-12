<?php

namespace App\Http\Controllers;

use App\Models\PpidInfopublicSubcategory;
use Illuminate\Http\Request;

class PpidInfopublicSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:ppidInfopublicSubcategory-index|ppidInfopublicSubcategory-create|ppidInfopublicSubcategory-edit|ppidInfopublicSubcategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:ppidInfopublicSubcategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ppidInfopublicSubcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ppidInfopublicSubcategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $ppidInfopublicSubcategories = PpidInfopublicSubcategory::all();
        return view('backend.ppidInfopublicSubcategory.index', compact('ppidInfopublicSubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ppidInfopublicSubcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $data = $request->validate([
                'name' => 'required',
            ]);

            PpidInfopublicSubcategory::create($data);
            session()->flash('success');
            return redirect(route('ppidInfopublicSubcategory.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpidInfopublicSubcategory  $ppidInfopublicSubcategory
     * @return \Illuminate\Http\Response
     */
    public function show(PpidInfopublicSubcategory $ppidInfopublicSubcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidInfopublicSubcategory  $ppidInfopublicSubcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidInfopublicSubcategory $ppidInfopublicSubcategory)
    {
        return view('backend.ppidInfopublicSubcategory.create', compact('ppidInfopublicSubcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidInfopublicSubcategory  $ppidInfopublicSubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidInfopublicSubcategory $ppidInfopublicSubcategory)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $ppidInfopublicSubcategory->update($data);
        session()->flash('success');
        return redirect(route('ppidInfopublicSubcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidInfopublicSubcategory  $ppidInfopublicSubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidInfopublicSubcategory $ppidInfopublicSubcategory)
    {
        $ppidInfopublicSubcategory->delete();
        session()->flash('success');
        return redirect(route('ppidInfopublicSubcategory.index'));
    }
}
