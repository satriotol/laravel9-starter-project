<?php

namespace App\Http\Controllers;

use App\Models\PpidInfopublicFile;
use App\Models\PpidInfopublicSubcategory;
use App\Models\TemporaryFile;
use App\Models\PpidInfopublic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PpidInfopublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:ppidInfopublic-index|ppidInfopublic-create|ppidInfopublic-edit|ppidInfopublic-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:ppidInfopublic-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ppidInfopublic-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ppidInfopublic-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $ppidInfopublics = PpidInfopublic::all();
        return view('backend.ppidInfopublic.index', compact('ppidInfopublics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ppidInfopublicSubcategories = PpidInfopublicSubcategory::all();
        return view('backend.ppidInfopublic.create', compact('ppidInfopublicSubcategories'));
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
            'category' => 'required',
            'ppid_infopublic_subcategory_id' => 'required',
            'nameDetail' => 'nullable',
            'file' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $temporaryFileDetail = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFileDetail) {
                $data['file'] = $temporaryFileDetail->filename;
                $temporaryFileDetail->delete();
            };
            $data['type'] = "Detail";
            $ppidInfopublic = PpidInfopublic::create($data);
            PpidInfopublicFile::create([
                'ppid_infopublic_id' => $ppidInfopublic->id,
                'name' => $data['nameDetail'],
                'file' => $data['file'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        session()->flash('success');
        return redirect()->route('ppidInfopublic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpidInfopublic  $ppidInfopublic
     * @return \Illuminate\Http\Response
     */
    public function show(PpidInfopublic $ppidInfopublic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidInfopublic  $ppidInfopublic
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidInfopublic $ppidInfopublic)
    {
        $ppidInfopublicSubcategories = PpidInfopublicSubcategory::all();
        return view('backend.ppidInfopublic.create', compact('ppidInfopublic', 'ppidInfopublicSubcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidInfopublic  $ppidInfopublic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidInfopublic $ppidInfopublic)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'ppid_infopublic_subcategory_id' => 'required',
            'nameDetail' => 'nullable',
            'file' => 'nullable',
        ]);
        $temporaryFileDetail = TemporaryFile::where('filename', $request->file)->first();
        if ($temporaryFileDetail) {
            $data['file'] = $temporaryFileDetail->filename;
            $temporaryFileDetail->delete();
        };
        $ppidInfopublic->update($data);
        if ($data['nameDetail']) {
            PpidInfopublicFile::create([
                'ppid_infopublic_id' => $ppidInfopublic->id,
                'name' => $data['nameDetail'],
                'file' => $data['file'],
            ]);
        }
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidInfopublic  $ppidInfopublic
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidInfopublic $ppidInfopublic)
    {
        $ppidInfopublic->delete();
        session()->flash('success');
        return redirect()->route('ppidInfopublic.index');
    }
}
