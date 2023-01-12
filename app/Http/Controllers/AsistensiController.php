<?php

namespace App\Http\Controllers;

use App\Models\Asistensi;
use App\Models\KonsultasiAsistensiCategory;
use App\Models\Opd;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:asistensi-index|asistensi-create|asistensi-edit|asistensi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:asistensi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:asistensi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:asistensi-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $asistensis = Asistensi::getData()->paginate();
        return view('backend.asistensi.index', compact('asistensis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konsultasi_asistensi_categories = KonsultasiAsistensiCategory::getAsistensi();
        return view('backend.asistensi.create', compact('konsultasi_asistensi_categories'));
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
            'konsultasi_asistensi_category_id' => 'required',
            'waktu_pertemuan' => 'required',
            'description_permasalahan' => 'required',
            'file' => 'nullable',
            'description_file' => 'nullable',
            'user_id' => 'nullable',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
        if ($temporaryFile) {
            $data['file'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        $data['user_id'] = Auth::user()->id;
        Asistensi::create($data);
        session()->flash('success');
        return redirect(route('asistensi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistensi  $asistensi
     * @return \Illuminate\Http\Response
     */
    public function show(Asistensi $asistensi)
    {
        $statuses = Asistensi::STATUSES;
        return view('backend.asistensi.show', compact('asistensi', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistensi  $asistensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistensi $asistensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistensi  $asistensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistensi $asistensi)
    {
        $data = $request->validate([
            'status' => 'required',
            'response' => 'required',
        ]);
        $asistensi->update($data);
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistensi  $asistensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistensi $asistensi)
    {
        $asistensi->delete();
        session()->flash('success');
        return redirect(route('asistensi.index'));
    }
}
