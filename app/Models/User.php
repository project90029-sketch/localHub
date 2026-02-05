<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'phone',
        'aadhaar',
        'city',
        'profile_image',
    ];

    /**
     * Hidden fields (won’t appear in JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
    ];


    public function professionalProfile()
    {
        return $this->hasOne (\App\Models\ProfessionalProfile::class);
    }
}
