<?php

namespace App\Http\Controllers;

use App\Models\BeritaGallery;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class BeritaGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritaGalleries = BeritaGallery::all();
        return view('backend.beritaGallery.index', compact('beritaGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.beritaGallery.create');
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
            'berita_id' => 'required',
            'image' => 'required',
        ]);
       $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        BeritaGallery::create($data);
        session()->flash('success');
        return redirect(route('beritaGallery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaGallery  $beritaGallery
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaGallery $beritaGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaGallery  $beritaGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaGallery $beritaGallery)
    {
        return view('backend.beritaGallery.create', compact('beritaGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaGallery  $beritaGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaGallery $beritaGallery)
    {
        $data = $request->validate([
            'berita_id' => 'required',
            'image' => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $beritaGallery->deleteFile();
            $temporaryFile->delete();
        };
        $beritaGallery->update($data);
        session()->flash('success');
        return redirect(route('beritaGallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaGallery  $beritaGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaGallery $beritaGallery)
    {
        $beritaGallery->delete();
        session()->flash('success');
        return back();
    }
}
