<?php

namespace App\Http\Controllers;

use App\Models\MediaLibrary;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class MediaLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaLibraries = MediaLibrary::all();
        return view('backend.mediaLibrary.index', compact('mediaLibraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mediaLibrary.create');
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
            'name' => 'nullable',
            'images' => 'nullable'
        ]);
        foreach ($request->images as $imageFile) {
            $temporaryFile = TemporaryFile::where('filename', $imageFile)->first();
            if ($temporaryFile) {
                $image = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            MediaLibrary::create([
                'name' => $data['name'],
                'image' => $image,
            ]);
        }
        session()->flash('success');
        return redirect(route('mediaLibrary.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function show(MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaLibrary $mediaLibrary)
    {
        $mediaLibrary->delete();
        session()->flash('success');
        return redirect(route('mediaLibrary.index'));
    }
}
