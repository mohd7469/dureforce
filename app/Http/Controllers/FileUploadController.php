<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileUploadController extends Controller
{
    function uploadFile(FileUploadRequest $request){
        try {
            $path = imagePath()['attachments']['path'];
            $file=$request->file;
            $filename = uploadAttachments($file, $path);
            $file_extension = getFileExtension($file);
            $url = $path . '/' . $filename;
            $uploaded_name = $file->getClientOriginalName();
            $upload_file=[
                'name' => $filename,
                'uploaded_name' => $uploaded_name,
                'url'           => $url,
                'type' =>$file_extension,
            ];
            Log::error(["Dropzone File Uploaded Successfully "]);
            return response()->json(['uploaded_file' =>$upload_file]);

        } catch (\Throwable $th) {
            Log::error(["Error In Uploading File : ". $th->getMessage()]);
            throw $th;
        }
    }
}
