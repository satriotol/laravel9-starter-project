<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:berita-index|berita-create|berita-edit|berita-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:berita-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:berita-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:berita-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $beritas = Berita::paginate();
        return view('',compact('beritas'));
    }
    public function create()
    {
        return view('');
    }
    public function store(Request $request)
    {
        $data = $request->validate([

        ]);
        Berita::create($data);
        session()->flash('success');
        return redirect(route(''));
    }
    public function edit(Berita $berita)
    {
        return view('', compact('berita'));
    }
    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
        ]);
        $berita->update($data);
        session()->flash('success');
        return redirect(route(''));
    }
    public function destroy(Berita $berita)
    {
        $berita->delete();
        session()->flash('success');
        return back();
    }
}