<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class MasterController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:master-index|master-create|master-edit|master-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:master-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:master-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:master-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $masters = Master::all()->first();
        if ($masters) {
            return view('backend.master.create', compact('masters'));
        }
        return view('backend.master.create');

        // $masters = Master::all();
        // return view('backend.master.index', compact('masters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.create');
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
            'banner'        => 'required',
            'background'    => 'required',
            'logo'          => 'required',
            'phone'         => 'required',
            'email'         => 'required'
        ]);
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannername = $banner->getClientOriginalName();
            $banner_name = date('mdYHis') . '-' . $bannername;
            $banner = $banner->storeAs('banner', $banner_name, 'public_uploads');
            $data['banner'] = $banner;
        };
        if ($request->hasFile('background')) {
            $background = $request->file('background');
            $backgroundname = $background->getClientOriginalName();
            $background_name = date('mdYHis') . '-' . $backgroundname;
            $background = $background->storeAs('background', $background_name, 'public_uploads');
            $data['background'] = $background;
        };
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoname = $logo->getClientOriginalName();
            $logo_name = date('mdYHis') . '-' . $logoname;
            $logo = $logo->storeAs('logo', $logo_name, 'public_uploads');
            $data['logo'] = $logo;
        };
        Master::create($data);
        session()->flash('success');
        return redirect(route('master.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        return view('backend.master.create', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
       $data = $request->validate([
            'banner'        => 'nullable',
            'background'    => 'nullable',
            'logo'          => 'nullable',
            'phone'         => 'required',
            'email'         => 'required'
        ]);


        if ($request->hasFile('banner')) {
            $master->deleteFileBanner();
            $banner = $request->file('banner');
            $bannername = $banner->getClientOriginalName();
            $banner_name = date('mdYHis') . '-' . $bannername;
            $banner = $banner->storeAs('file', $banner_name, 'public_uploads');
            $data['banner'] = $banner;
        };


        if ($request->hasFile('background')) {
            $master->deleteFileBackground();
            $background = $request->file('background');
            $backgroundname = $background->getClientOriginalName();
            $background_name = date('mdYHis') . '-' . $backgroundname;
            $background = $background->storeAs('file', $background_name, 'public_uploads');
            $data['background'] = $background;
        };

        if ($request->hasFile('logo')) {
            $master->deleteFileLogo();
            $logo = $request->file('logo');
            $logoname = $logo->getClientOriginalName();
            $logo_name = date('mdYHis') . '-' . $logoname;
            $logo = $logo->storeAs('file', $logo_name, 'public_uploads');
            $data['logo'] = $logo;
        };
        $master->update($data);
        session()->flash('success');
        return redirect(route('master.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();
        $master->deleteFile();
        session()->flash('success');
        return redirect(route('master.index'));
    }
}
