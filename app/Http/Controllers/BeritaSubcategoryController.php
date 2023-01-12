<?php

namespace App\Http\Controllers;

use App\Models\BeritaSubcategory;
use App\Models\BeritaCategory;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class BeritaSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritaSubcategories = BeritaSubcategory::all();
        return view('backend.beritaSubcategory.index', compact('beritaSubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $berita_categories = BeritaCategory::all();
        return view('backend.beritaSubcategory.create', compact('berita_categories'));
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
            'berita_category_id' => 'required',
            'name' => 'required',
            'image' => 'nullable',
        ]);

        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        }
        BeritaSubcategory::create($data);
        session()->flash('success');
        return redirect(route('beritaSubcategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaSubcategory  $beritaSubcategory
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaSubcategory $beritaSubcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaSubcategory  $beritaSubcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaSubcategory $beritaSubcategory)
    {
        $berita_categories = BeritaCategory::all();
        return view('backend.beritaSubcategory.create', compact('beritaSubcategory', 'berita_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaSubcategory  $beritaSubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaSubcategory $beritaSubcategory)
    {
        $data = $request->validate([
            'berita_category_id' => 'required',
            'name' => 'required',
            'image' => 'nullable',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $beritaSubcategory->deleteFile();
            $temporaryFile->delete();
        }
        $beritaSubcategory->update($data);
        session()->flash('success');
        return redirect(route('beritaSubcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaSubcategory  $beritaSubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaSubcategory $beritaSubcategory)
    {
        $beritaSubcategory->deleteFile();
        $beritaSubcategory->delete();
        session()->flash('success');
        return redirect(route('beritaSubcategory.index'));
    }
}
