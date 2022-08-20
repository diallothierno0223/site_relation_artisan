<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Comment;
use App\Models\Abonnement;
use App\Models\CompletedProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function completedProfile(){
        return $this->hasOne(CompletedProfile::class);
    }

    public function images(){
        return $this->belongsToMany(Image::class);
    }

    public function abonnement(){
        return $this->hasOne(Abonnement::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
