<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:documentCategory-index|documentCategory-create|documentCategory-edit|documentCategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:documentCategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:documentCategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:documentCategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $documentCategories = DocumentCategory::all();
        return view('backend.documentCategory.index', compact('documentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.documentCategory.create');
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
            'description' => 'nullable',
            'file' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $documentCategory = DocumentCategory::create($data);
            $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFile) {
                $data['file'] = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            Document::create([
                'document_category_id' => $documentCategory->id,
                'name' => $request->nameFile,
                'file' => $data['file']
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        session()->flash('success');
        return redirect(route('documentCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentCategory  $documentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentCategory $documentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentCategory  $documentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentCategory $documentCategory)
    {
        return view('backend.documentCategory.create', compact('documentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentCategory  $documentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentCategory $documentCategory)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $documentCategory->update($data);
            $temporaryFile = TemporaryFile::where('filename', $request->file)->first();
            if ($temporaryFile) {
                $data['file'] = $temporaryFile->filename;
                $temporaryFile->delete();
            };
            Document::create([
                'document_category_id' => $documentCategory->id,
                'name' => $request->nameFile,
                'file' => $data['file']
            ]);
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
     * @param  \App\Models\DocumentCategory  $documentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentCategory $documentCategory)
    {
        $documentCategory->delete();
        session()->flash('success');
        return redirect(route('documentCategory.index'));
    }
}
