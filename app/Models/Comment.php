<?php

namespace App\Models;
use App\Models\User;
use App\Models\Photo;
use App\Models\Video;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
