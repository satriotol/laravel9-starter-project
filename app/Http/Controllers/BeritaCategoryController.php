<?php

namespace App\Http\Controllers;

use App\Models\BeritaCategory;
use App\Models\BeritaCategoryGallery;
use App\Models\BeritaGallery;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class BeritaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:beritaCategory-index|beritaCategory-create|beritaCategory-edit|beritaCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:beritaCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:beritaCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:beritaCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $beritaCategories = BeritaCategory::all();
        return view('backend.beritaCategory.index', compact('beritaCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.beritaCategory.create');
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
            'image' => 'nullable',
            'is_kegiatan' => 'nullable',
            'logo' => 'nullable',
            'description' => 'nullable',
            'images' => 'nullable',
        ]);

        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        $temporaryLogo = TemporaryFile::where('filename', $request->logo)->first();
        if ($temporaryLogo) {
            $data['logo'] = $temporaryLogo->filename;
            $temporaryLogo->delete();
        };
        $beritaCategory = BeritaCategory::create($data);
        if ($request->images) {
            foreach ($request->images as $image) {
                $temporaryImage = TemporaryFile::where('filename', $image)->first();
                if ($temporaryImage) {
                    BeritaCategoryGallery::create([
                        'image' => $temporaryImage->filename,
                        'berita_category_id' => $beritaCategory->id,
                    ]);
                    $temporaryImage->delete();
                };
            }
        }
        session()->flash('success');
        return redirect(route('beritaCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaCategory  $beritaCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaCategory $beritaCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaCategory  $beritaCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaCategory $beritaCategory)
    {
        return view('backend.beritaCategory.create', compact('beritaCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaCategory  $beritaCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaCategory $beritaCategory)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'is_kegiatan' => 'nullable',
            'logo' => 'nullable',
            'description' => 'nullable',
            'images' => 'nullable',
        ]);
        $data['is_kegiatan'] = $request->is_kegiatan;

        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };

        $temporaryLogo = TemporaryFile::where('filename', $request->logo)->first();
        if ($temporaryLogo) {
            $data['logo'] = $temporaryLogo->filename;
            $temporaryLogo->delete();
        };
        if ($request->images) {
            foreach ($request->images as $image) {
                $temporaryImage = TemporaryFile::where('filename', $image)->first();
                if ($temporaryImage) {
                    BeritaCategoryGallery::create([
                        'image' => $temporaryImage->filename,
                        'berita_category_id' => $beritaCategory->id,
                    ]);
                    $temporaryImage->delete();
                };
            }
        }
        $beritaCategory->update($data);
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaCategory  $beritaCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaCategory $beritaCategory)
    {
        $beritaCategory->delete();
        session()->flash('success');
        return redirect(route('beritaCategory.index'));
    }
    public function destroyLogo(BeritaCategory $beritaCategory)
    {
        $beritaCategory->update([
            'logo' => null
        ]);
        session()->flash('success');
        return back();
    }
    public function destroyImage(BeritaCategory $beritaCategory)
    {
        $beritaCategory->update([
            'image' => null
        ]);
        session()->flash('success');
        return back();
    }
}
