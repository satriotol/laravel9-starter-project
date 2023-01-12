<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Termwind\Components\Dd;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:link-index|link-create|link-edit|link-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:link-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:link-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:link-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $links = Link::all();
        return view('backend.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.link.create');
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
            'url' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
            'whatsapp_url' => 'nullable',
            'short_description' => 'nullable',
            'google_form_url' => 'nullable',
            'is_pengaduan' => 'nullable',
            'is_layanan_utama' => 'nullable',
            'is_terkait' => 'nullable',
            'pengaduan_link' => 'required_if:is_pengaduan,1',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        Link::create($data);
        session()->flash('success');
        return redirect(route('link.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('backend.link.create', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
            'whatsapp_url' => 'nullable',
            'short_description' => 'nullable',
            'google_form_url' => 'nullable',
            'is_pengaduan' => 'nullable',
            'is_layanan_utama' => 'nullable',
            'is_terkait' => 'nullable',
            'pengaduan_link' => 'required_if:is_pengaduan,1',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            // $link->deleteFile();
            $temporaryFile->delete();
        };
        $data['is_pengaduan'] = $request->is_pengaduan ;
        $data['is_layanan_utama'] = $request->is_layanan_utama ;
        $data['is_terkait'] = $request->is_terkait ;
        $link->update($data);
        session()->flash('success');
        return redirect(route('link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        session()->flash('success');
        return redirect(route('link.index'));
    }
    public function destroyImage(Link $link)
    {
        $link->update([
            'image' => null
        ]);
        session()->flash('success');
        return back();
    }
}
