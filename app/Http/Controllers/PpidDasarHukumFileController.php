<?php

namespace App\Http\Controllers;

use App\Models\PpidDasarHukumFile;
use App\Models\PPIDDasarHukum;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class PpidDasarHukumFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('permission:ppidDasarHukumFile-index|ppidDasarHukumFile-create|ppidDasarHukumFile-edit|ppidDasarHukumFile-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:ppidDasarHukumFile-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:ppidDasarHukumFile-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:ppidDasarHukumFile-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $ppidDasarHukumFiles = PpidDasarHukumFile::all();
        return view('backend.ppidDasarHukumFile.index', compact('ppidDasarHukumFiles'));
    }

    public function create()
    {
        $PPIDDasarHukums = PPIDDasarHukum::all();
        return view('backend.ppidDasarHukumFile.create', compact('PPIDDasarHukums'));
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
            'ppid_dasar_hukum_id' => 'required',
            'name'                => 'required',
            'file'                => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
        if ($temporaryFile) {
            $data['file'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        PpidDasarHukumFile::create($data);
        session()->flash('success');
        return redirect(route('ppidDasarHukumFile.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpidDasarHukumFile  $ppidDasarHukumFile
     * @return \Illuminate\Http\Response
     */
    public function show(PpidDasarHukumFile $ppidDasarHukumFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidDasarHukumFile  $ppidDasarHukumFile
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidDasarHukumFile $ppidDasarHukumFile)
    {
        $PPIDDasarHukums = PPIDDasarHukum::all();
        return view('backend.ppidDasarHukumFile.create', compact('ppidDasarHukumFile', 'PPIDDasarHukums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidDasarHukumFile  $ppidDasarHukumFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidDasarHukumFile $ppidDasarHukumFile)
    {
        $data = $request->validate([
            'ppid_dasar_hukum_id' => 'required',
            'name'                => 'required',
            'file'                => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
        if ($temporaryFile) {
            $data['file'] = $temporaryFile->filename;
            $ppidDasarHukumFile->deleteFile();
            $temporaryFile->delete();
        };
        $ppidDasarHukumFile->update($data);
        session()->flash('success');
        return redirect(route('ppidDasarHukumFile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidDasarHukumFile  $ppidDasarHukumFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidDasarHukumFile $ppidDasarHukumFile)
    {
        $ppidDasarHukumFile->delete();
        $ppidDasarHukumFile->deleteFile();
        session()->flash('success');
        return back();
        // return redirect(route('ppidDasarHukum.index'));
    }
}
