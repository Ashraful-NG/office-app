<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function fileUpload($file)
    {
        $path = null;

        if ($file != null) {
            $dateTime = now()->format('Ymd_His');
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Generate a unique filename based on date, time, original filename, and schedule ID
            $filename = "{$dateTime}_{$originalFilename}.{$file->getClientOriginalExtension()}";

            // $folderPath = public_path("storage/class_document");
            $folderPath = storage_path("app/public/document");
            // Check if the folder exists, create it if not
            if (!File::isDirectory($folderPath)) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $file->move($folderPath, $filename);
            $path = "document/{$filename}";
        }

        return $path;
    }

    protected function removeFile($filePath)
    {
        if (File::exists($filePath)) {
            File::delete($filePath);
            return true;
        }

        return false;
    }
}
