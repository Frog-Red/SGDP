<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_id', // Add the role_id field
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

    // Define the relationship with the role
    public function roles()
    {
        return $this->belongsToMany(roles::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * Check if the user has any of the specified roles.
     *
     * @param array ...$roleNames
     * @return bool
     */
    public function hasAnyRole(...$roleIds)
    {
        return $this->roles()->whereIn('roles.id', $roleIds)->exists();
    }


    
}
