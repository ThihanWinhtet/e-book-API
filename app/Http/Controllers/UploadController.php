<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload($request, $folder, $filename)
    {
        $request->validate([
            'book_url' => 'required | file'
        ]);
        $uploadedFile = $request->file('book_url');

        $filename = time() . '_' . $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs("/$folder", $filename);
        return $filename;
    }


    public function show($filename)
    {
        // $fileContents = file_get_contents($filename);
        // dd($fileContents);
        $path = storage_path('app/books/' . $filename);
        return response()->file($path);
    }
}
