<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService {

    public static function upload(UploadedFile $file, $folder) {
        $file_name = time()."_".$file->getClientOriginalName();

        $file->move(\public_path(). "/img/" . $folder, $file_name);

        $file_name = $folder . '/' . $file_name;

        return $file_name;
    }
}