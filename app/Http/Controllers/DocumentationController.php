<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public function upload(Request $request) {
        $folderPlace = $request->input('folder');

        $msg = "Please upload at least one file";

        //If file does exist
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $uploadFile){
                $file = $uploadFile->getClientOriginalName();
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                Storage::disk("google")->putFileAs($folderPlace, $uploadFile, $fileName);
            }

            $msg = "File successfully uploaded";
        }
        
        return [
            'response' => $msg
        ];
    }
}
