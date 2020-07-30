<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        "comment",
        "user_id",
    ];

    public function item()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
