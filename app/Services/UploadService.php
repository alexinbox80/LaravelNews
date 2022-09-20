<?php

namespace App\Services;

use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $uploadedFile): string
    {
        $path = $uploadedFile->storeAs('news', $uploadedFile->hashName(), 'public');

        if ($path === false) {
            throw new UploadException('File was not upload');
        }

        return $path;
    }
}
