<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\NewUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_interest()
    {
        return $this->hasMany(UserInterest::class, 'user_id', 'id');
    }

    public function role_user()
    {
        return $this->belongsToMany(RoleUser::class, 'user_id', 'role_id');
    }

     /**
     * Send notification when a new user is created.
     *
     * @param  string  $token
     */
    public function sendNewUserNotification($token)
    {
        $this->notify(new NewUser($token, $this));
    }

}
