<?php

namespace App\Helpers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TagHelper extends Model
{
    public static function home(array $tags=null)
    {
        $resultTags = (Cache::remember('tagTableHome', 60, function() {
            return (new Tag)
            ->select(['tags.tag', 'tags.slug'])
            ->SelectRaw('COUNT(tags.tag) total')
            ->innerPost()
            ->groupBy(['tags.tag', 'tags.slug'])
            ->orderByRaw('COUNT(tags.tag) DESC')
            ->get();
        }));
        foreach($resultTags as $tag) {
            $tag->active = false;

            if (!empty($tags) && in_array($tag->slug, $tags)) {
                $tag->active = true;
            }
        }

        return $resultTags;
    }
}
