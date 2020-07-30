<?php

namespace App\Helpers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CategoryHelper extends Model
{
    public static function home()
    {
        return (Cache::remember('categoryTableHome', 60, function () {
            return (new Category)
                ->get();
        }));
    }
}
