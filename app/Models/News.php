<?php

namespace App\Models;
use App\Models\User;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
