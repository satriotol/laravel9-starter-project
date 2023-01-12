<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\UpgCategory;
use App\Models\UpgReport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpgReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:upgReport-index|upgReport-create|upgReport-edit|upgReport-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:upgReport-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:upgReport-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:upgReport-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $upgReports = UpgReport::getData()->paginate();
        return view('backend.upgReport.index', compact('upgReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $upgCategories = UpgCategory::all();
        return view('backend.upgReport.create', compact('upgCategories'));
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
            'upg_category_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'jabatan' => 'required',
            'instansi' => 'required',
            'phone' => 'required',
            'hubungan_dengan_pemberi' => 'required',
            'datetime_gratifikasi' => 'required',
            'address_gratifikasi' => 'required',
            'uraian_jenis_gratifikasi' => 'required',
            'nilai_gratifikasi' => 'required',
            'alasan_pemberian' => 'required',
            'kronologi_pemberian' => 'required',
            'user_id' => 'nullable',
            'file' => 'nullable',
        ]);
        $data['user_id'] = Auth::user()->id;
        $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
        if ($temporaryFile) {
            $data['file'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        UpgReport::create($data);
        session()->flash('success');
        return redirect(route('upgReport.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpgReport  $upgReport
     * @return \Illuminate\Http\Response
     */
    public function show(UpgReport $upgReport)
    {
        $statuses = UpgReport::STATUSES;
        return view('backend.upgReport.show', compact('upgReport', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpgReport  $upgReport
     * @return \Illuminate\Http\Response
     */
    public function edit(UpgReport $upgReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpgReport  $upgReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpgReport $upgReport)
    {
        $data = $request->validate([
            'status' => 'required',
            'response' => 'required',
        ]);
        $upgReport->update($data);
        session()->flash('success');
        return back();
    }
    public function exportPdf(UpgReport $upgReport)
    {
        $pdf = Pdf::loadView('pdf.upgReport', compact('upgReport'));
        return $pdf->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpgReport  $upgReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpgReport $upgReport)
    {
        $upgReport->delete();
        session()->flash('success');
        return redirect(route('upgReport.index'));
    }
}
