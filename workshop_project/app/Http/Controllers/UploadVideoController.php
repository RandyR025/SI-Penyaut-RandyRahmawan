<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Storage;
use File;

class UploadVideoController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('video')) {
            $files = $request->file('video');
            $newFileName = "";
                $fileExt = $files->extension();
                $newFileName = Str::random(20) . '.' . $fileExt;
                $path = public_path().'/videos/temp';
                $files->move($path, $newFileName);

            return $newFileName;
        }

        return '';

    }

    public function destroy(Request $request)
    {

        $file = $request->getContent();

        File::delete('videos/temps/' . $file);

        return $file;

    }
}
