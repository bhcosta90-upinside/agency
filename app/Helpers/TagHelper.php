<?php

namespace App\Helpers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagHelper extends Model
{
    public static function home()
    {
        return (new Tag)
        ->select(['tags.tag', 'tags.slug'])
        ->SelectRaw('COUNT(tags.tag) total')
        ->innerPost()
        ->groupBy(['tags.tag', 'tags.slug'])
        ->orderByRaw('COUNT(tags.tag) DESC')
        ->get();
    }
}
