<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Role;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    protected $guard = [];
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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

    protected $with = ['roles'];

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

    public function authAcessToken()
    {
        return $this->hasMany(OauthAccessToken::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($pemissionCheck)
    {
        $roles = Auth::user()->roles;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('type', $pemissionCheck)) {
                return true;
            }
           
        }
        return false;
    }
}
