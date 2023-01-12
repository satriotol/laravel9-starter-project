<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiAsistensiCategory;
use App\Models\Opd;
use App\Models\Pertemuan;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:pertemuan-index|pertemuan-create|pertemuan-edit|pertemuan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pertemuan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pertemuan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pertemuan-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $pertemuans = Pertemuan::getData()->paginate();
        return view('backend.pertemuan.index', compact('pertemuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konsultasi_asistensi_categories = KonsultasiAsistensiCategory::getPertemuan();
        $opds = Opd::all();
        return view('backend.pertemuan.create', compact('konsultasi_asistensi_categories', 'opds'));
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
            'opd_id' => 'required',
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
        Pertemuan::create($data);
        session()->flash('success');
        return redirect(route('pertemuan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertemuan $pertemuan)
    {
        $statuses = Pertemuan::STATUSES;
        return view('backend.pertemuan.show', compact('pertemuan', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertemuan $pertemuan)
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
        $pertemuan->update($data);
        session()->flash('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertemuan $pertemuan)
    {
        $pertemuan->delete();
        session()->flash('success');
        return back();
    }
}
