<?php

namespace App\Models;
use App\Models\UserRole;
use App\Models\Caption;
use App\Models\Contact;
use App\Models\Profession;
use App\Models\EmploymentRecord;
use App\Models\EducationRecord;
use App\Models\ProfessionalRecord;
use App\Models\Document;
use App\Models\UserDocument;
use App\Models\ProfilePhoto;
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

    public function captions()
    {
        return $this->hasMany(Caption::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function like()
    {
        return $this->belongsTo(Like::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function profilePhoto()
    {
        return $this->hasOne(ProfilePhoto::class,'user_id');
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function education_records()
    {
        return $this->hasMany(EducationRecord::class);
    }

    public function employment_records()
    {
        return $this->hasMany(EmploymentRecord::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
