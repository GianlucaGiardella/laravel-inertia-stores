<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class Slug
{
    public static function unique($string, $model)
    {
        $baseSlug = Str::slug($string);

        $index = 1;

        $slug = $baseSlug;

        while ($model::where('slug', $slug)->first()) {
            $slug = $baseSlug . '-' . $index;
            $index++;
        }

        return $slug;
    }
}
