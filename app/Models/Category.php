<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_has_categories', 'category_id', 'post_id', 'id');
    }
}
