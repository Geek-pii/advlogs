<?php

namespace App\Traits;

use Image;
use Storage;

trait UploadPhotoTrait
{
    public function storePhoto($inputFile, $folderName = 'courses')
    {
        $fileExtension = $inputFile->getClientOriginalExtension();
        $fileClientOriginalName = $inputFile->getClientOriginalName();
        $fileName = str_replace('.' . $fileExtension, '', $fileClientOriginalName) . '-' . time() . '.' . $fileExtension;

        $imageResult = [];
        $image = Image::make($inputFile);
        $imageSizeArr = config('image.size');
        foreach ($imageSizeArr as $key => $imageSize) {
            $image->resize($imageSize['width'], $imageSize['height'], function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();

            Storage::disk('public')->put($folderName . '/' . $key . '/' . $fileName, $image, 'public');
            $imageResult['url'][$key] = $folderName . '/' . $key . '/' . $fileName;
            $imageResult['name'] = $fileClientOriginalName;
        }

        return $imageResult;
    }
}
