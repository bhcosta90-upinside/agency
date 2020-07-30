<?php

namespace App\Suport;

use CoffeeCode\Cropper\Cropper as C;

class Cropper
{
    public static function thumb(string $path, int $width, int $height = null)
    {
        $cropper = new C(public_path('frontend/img/cache'));
        $pathThumb = $cropper->make($path, $width, $height);
        $file = collect(explode('/', $pathThumb))->last();
        return 'cache/' . $file;
    }
}
