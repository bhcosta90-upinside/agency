<?php

namespace App\Helpers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TagHelper extends Model
{
    public static function home()
    {
        return (Cache::remember('tagTableHome', 60, function() {
            return (new Tag)
            ->select(['tags.tag', 'tags.slug'])
            ->SelectRaw('COUNT(tags.tag) total')
            ->innerPost()
            ->groupBy(['tags.tag', 'tags.slug'])
            ->orderByRaw('COUNT(tags.tag) DESC')
            ->get();
        }));
    }
}
