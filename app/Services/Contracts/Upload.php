<?php
/**
 * Created by PhpStorm.
 * User: lexx
 * Date: 18.09.2022
 * Time: 22:55
 */

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface Upload
{
    public function uploadImage(UploadedFile $uploadedFile): string;
}
