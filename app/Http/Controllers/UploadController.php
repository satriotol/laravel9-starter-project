<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'image',
            'file' => 'file',
            'logo' => 'image'
        ]);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $name = $logo->getClientOriginalName();
            $logo_name = date('mdYHis') . '-' . $name;
            $logo = $logo->storeAs('logo', $logo_name, 'public_uploads');

            TemporaryFile::create([
                'filename' => $logo
            ]);
            return $logo;
        };

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image_name = date('mdYHis') . '-' . $name;
            $image = $image->storeAs('image', $image_name, 'public_uploads');

            TemporaryFile::create([
                'filename' => $image
            ]);
            return $image;
        };
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $name = $image->getClientOriginalName();
                $image_name = date('mdYHis') . '-' . $name;
                $image = $image->storeAs('image', $image_name, 'public_uploads');

                TemporaryFile::create([
                    'filename' => $image
                ]);
                return $image;
            }
        };
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file_name = date('mdYHis') . '-' . $name;
            $file = $file->storeAs('file', $file_name, 'public_uploads');

            TemporaryFile::create([
                'filename' => $file
            ]);
            return $file;
        };
        if ($request->hasFile('response_file')) {
            $response_file = $request->file('response_file');
            $name = $response_file->getClientOriginalName();
            $file_name = date('mdYHis') . '-' . $name;
            $response_file = $response_file->storeAs('file', $file_name, 'public_uploads');

            TemporaryFile::create([
                'filename' => $response_file
            ]);
            return $response_file;
        };
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $name = $icon->getClientOriginalName();
            $icon_name = date('mdYHis') . '-' . $name;
            $icon = $icon->storeAs('icon', $icon_name, 'public_uploads');

            TemporaryFile::create([
                'filename' => $icon
            ]);
            return $icon;
        };
        return '';
    }
    public function revert(Request $request)
    {
        $temporaryFile = TemporaryFile::where('filename', $request->getContent())->first();
        $temporaryFile->deleteFile();
        $temporaryFile->delete();
    }
}
