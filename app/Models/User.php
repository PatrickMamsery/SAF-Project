<?php

namespace App\Models;
use App\Models\UserRole;
use App\Models\Caption;
use App\Models\Contact;
use App\Models\Profession;
use App\Models\View;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Upload;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }

    public function caption()
    {
        return $this->belongsTo(Caption::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function view()
    {
        return $this->belongsTo(View::class);
    }

    public function like()
    {
        return $this->belongsTo(Like::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class);
    }
}
