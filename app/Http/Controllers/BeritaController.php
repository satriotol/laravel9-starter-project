<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaCategory;
use App\Models\BeritaFile;
use App\Models\BeritaGallery;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:berita-index|berita-create|berita-edit|berita-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:berita-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:berita-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:berita-delete', ['only' => ['destroy']]);
        $this->middleware('permission:berita-verification', ['only' => ['verification']]);
    }
    public function index(Request $request)
    {
        $beritas = Berita::getBeritaAll($request);
        $request->flash();
        return view('backend.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beritaCategories = BeritaCategory::all();
        return view('backend.berita.create', compact('beritaCategories'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'berita_category_id' => 'required',
            'short_description' => 'nullable',
        ]);
        $data['user_id'] = Auth::user()->id;
        if (User::getUserRole(Auth::user()) != 'OPERATOR') {
            $data['is_verified'] = 1;
        }
        DB::beginTransaction();
        try {
            $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
            if ($temporaryFile) {
                $data['image'] = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            $berita = Berita::create($data);
            $temporaryFilePendukung = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFilePendukung) {
                $data['file'] = $temporaryFilePendukung->filename;
                BeritaFile::create([
                    'berita_id' => $berita->id,
                    'name' => 'test',
                    'file' => $data['file'],
                ]);
                $temporaryFilePendukung->delete();
            };
            if ($request->file('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $image = $imageFile;
                    $name = $image->getClientOriginalName();
                    $image_name = date('mdYHis') . '-' . $name;
                    $image = $image->storeAs('image', $image_name, 'public_uploads');
                    BeritaGallery::create([
                        'berita_id' => $berita->id,
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        session()->flash('success');
        return redirect(route('berita.index'));
    }

    public function verification(Berita $berita)
    {
        $berita->update([
            'is_verified' => 1,
        ]);
        session()->flash('success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        $beritaCategories = BeritaCategory::all();
        return view('backend.berita.create', compact('beritum', 'beritaCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'berita_category_id' => 'required',
            'short_description' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $data['user_id'] = Auth::user()->id;
            $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
            if ($temporaryFile) {
                $data['image'] = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            $temporaryFilePendukung = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFilePendukung) {
                $data['file'] = $temporaryFilePendukung->filename;
                BeritaFile::create([
                    'berita_id' => $beritum->id,
                    'name' => $request->nameFile,
                    'file' => $data['file'],
                ]);
                $temporaryFile->delete();
            };
            if ($request->file('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $image = $imageFile;
                    $name = $image->getClientOriginalName();
                    $image_name = date('mdYHis') . '-' . $name;
                    $image = $image->storeAs('image', $image_name, 'public_uploads');
                    BeritaGallery::create([
                        'berita_id' => $beritum->id,
                        'image' => $image,
                    ]);
                }
            }
            $beritum->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        if ($beritum->berita_galleries) {
            foreach ($beritum->berita_galleries as $berita_gallery) {
                $berita_gallery->delete();
                $berita_gallery->deleteFile();
            }
        }
        $beritum->delete();
        if ($beritum->image) {
            $beritum->deleteFile();
        }
        session()->flash('success');
        return redirect(route('berita.index'));
    }
}
