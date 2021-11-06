<?php

namespace App\Models;
use App\Models\User;
use App\Models\Comment;
use App\Models\Caption;
use App\Models\View;
use App\Models\Like;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
