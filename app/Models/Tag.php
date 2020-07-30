<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Tag extends Model
{
    public function scopeInnerPost(Builder $builder)
    {
        $builder->join('post_has_tags', 'post_has_tags.tag_id', '=', 'tags.id');
    }
}
