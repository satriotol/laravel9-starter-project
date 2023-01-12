<?php

namespace App\Http\Controllers;

use App\Models\PermohonanInformasi;
use App\Models\TemporaryFile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:permohonanInformasi-index|permohonanInformasi-create|permohonanInformasi-edit|permohonanInformasi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:permohonanInformasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permohonanInformasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permohonanInformasi-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permohonanInformasis = PermohonanInformasi::getData()->latest()->paginate();
        return view('backend.permohonanInformasi.index', compact('permohonanInformasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permohonanInformasi.create');
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
            'jenis_informasi' => 'required',
            'alasan_permohonan' => 'required',
            'user_id' => 'nullable',
        ]);
        $data['user_id'] = Auth::user()->id;
        PermohonanInformasi::create($data);
        session()->flash('success');
        return redirect(route('permohonanInformasi.index'));
    }
    public function exportPdf(PermohonanInformasi $permohonanInformasi)
    {
        $pdf = Pdf::loadView('pdf.permohonanInformasi', compact('permohonanInformasi'));
        return $pdf->stream();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function show(PermohonanInformasi $permohonanInformasi)
    {
        $statuses = PermohonanInformasi::STATUSES;
        return view('backend.permohonanInformasi.show', compact('permohonanInformasi', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function edit(PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermohonanInformasi $permohonanInformasi)
    {
        $data = $request->validate([
            'response' => 'required',
            'status' => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->response_file)->first();
        if ($temporaryFile) {
            $data['response_file'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        $permohonanInformasi->update($data);
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermohonanInformasi $permohonanInformasi)
    {
        $permohonanInformasi->delete();
        session()->flash('success');
        return back();
    }
}
