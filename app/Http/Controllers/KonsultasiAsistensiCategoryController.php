<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiAsistensiCategory;
use Illuminate\Http\Request;

class KonsultasiAsistensiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:konsultasiAsistensiCategory-index|konsultasiAsistensiCategory-create|konsultasiAsistensiCategory-edit|konsultasiAsistensiCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:konsultasiAsistensiCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:konsultasiAsistensiCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:konsultasiAsistensiCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $konsultasiAsistensiCategories = KonsultasiAsistensiCategory::all();
        return view('backend.konsultasiAsistensiCategory.index', compact('konsultasiAsistensiCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.konsultasiAsistensiCategory.create');
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
            'is_konsultasi' => 'nullable',
            'is_pertemuan' => 'nullable',
        ]);
        KonsultasiAsistensiCategory::create($data);
        session()->flash('success');
        return redirect(route('konsultasiAsistensiCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KonsultasiAsistensiCategory $konsultasiAsistensiCategory)
    {
        return view('backend.konsultasiAsistensiCategory.create', compact('konsultasiAsistensiCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonsultasiAsistensiCategory $konsultasiAsistensiCategory)
    {
        $data = $request->validate([
            'name' => 'required',
            'is_konsultasi' => 'nullable',
            'is_pertemuan' => 'nullable',
        ]);
        $data['is_konsultasi'] = $request->is_konsultasi;
        $data['is_pertemuan'] = $request->is_pertemuan;
        $konsultasiAsistensiCategory->update($data);
        session()->flash('success');
        return redirect(route('konsultasiAsistensiCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonsultasiAsistensiCategory $konsultasiAsistensiCategory)
    {
        $konsultasiAsistensiCategory->delete();
        session()->flash('success');
        return redirect(route('konsultasiAsistensiCategory.index'));
    }
}
