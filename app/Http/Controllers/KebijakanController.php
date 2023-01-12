<?php

namespace App\Http\Controllers;

use App\Models\Kebijakan;
use App\Models\KebijakanCategory;
use App\Models\KebijakanTema;
use App\Models\KebijakanStatus;
use App\Models\Tema;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KebijakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:kebijakan-index|kebijakan-create|kebijakan-edit|kebijakan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:kebijakan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kebijakan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kebijakan-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $kebijakans = Kebijakan::all();
        return view('backend.kebijakan.index', compact('kebijakans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kebijakan_categories = KebijakanCategory::all();
        $temas = Tema::all();
        $kebijakanStatuses = KebijakanStatus::all();
        return view('backend.kebijakan.create', compact('kebijakan_categories', 'temas', 'kebijakanStatuses'));
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
            'name'                  => 'required',
            'kebijakan_category_id' => 'required',
            'file'                  => 'nullable',
            'tema_id'               => 'nullable',
            'kebijakan_status_id'   => 'nullable',
            'entitas' => 'nullable',
            'nomor' => 'nullable',
            'tahun' => 'nullable',
            'ditetapkan_tanggal' => 'nullable',
            'diundangkan_tanggal' => 'nullable',
            'berlaku_tanggal' => 'nullable',
            'sumber' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFile) {
                $data['file'] = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            $kebijakan = Kebijakan::create($data);
            foreach ($request->tema_id as $tema_id) {
                KebijakanTema::create([
                    'kebijakan_id' => $kebijakan->id,
                    'tema_id' => $tema_id
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            return $th;
            DB::rollBack();
        }
        session()->flash('success');
        return redirect(route('kebijakan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function show(Kebijakan $kebijakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebijakan $kebijakan)
    {
        $kebijakan_categories = KebijakanCategory::all();
        $temas = Tema::all();
        $kebijakanStatuses = KebijakanStatus::all();
        return view('backend.kebijakan.create', compact('kebijakan', 'kebijakan_categories', 'temas', 'kebijakanStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kebijakan $kebijakan)
    {
        $data = $request->validate([
            'name'                  => 'required',
            'kebijakan_category_id' => 'required',
            'file'                  => 'nullable',
            'tema_id'               => 'nullable',
            'kebijakan_status_id'   => 'nullable',
            'entitas' => 'nullable',
            'nomor' => 'nullable',
            'tahun' => 'nullable',
            'ditetapkan_tanggal' => 'nullable',
            'diundangkan_tanggal' => 'nullable',
            'berlaku_tanggal' => 'nullable',
            'sumber' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFile) {
                $data['file'] = $temporaryFile->filename;
                $kebijakan->deleteFile();
                $temporaryFile->delete();
            };
            $kebijakan->update($data);
            $kebijakan->temas()->sync($request->tema_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        session()->flash('success');
        return redirect(route('kebijakan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebijakan $kebijakan)
    {
        $kebijakan->deleteFile();
        $kebijakan->delete();
        session()->flash('success');
        return redirect(route('kebijakan.index'));
    }
}
