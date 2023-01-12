<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:slider-index|slider-create|slider-edit|slider-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:slider-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
            'title' => 'nullable',
            'subtitle' => 'nullable',
            'image' => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $temporaryFile->delete();
        };
        Slider::create($data);
        session()->flash('success');
        return redirect(route('slider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.create', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'nullable',
            'subtitle' => 'nullable',
            'image' => 'nullable',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
        if ($temporaryFile) {
            $data['image'] = $temporaryFile->filename;
            $slider->deleteFile();
            $temporaryFile->delete();
        };
        $slider->update($data);
        session()->flash('success');
        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->deleteFile();
        $slider->delete();
        session()->flash('success');
        return redirect(route('slider.index'));
    }
}
