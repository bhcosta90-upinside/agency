<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function scopeInnerPost(Builder $builder)
    {
        $builder->join('post_has_tags', 'post_has_tags.tag_id', '=', 'tags.id');
    }
}
