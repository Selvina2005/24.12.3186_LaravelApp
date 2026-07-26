<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


#[Fillable([
    'organization_id',
    'name',
    'email',
    'password',
    'google_id',
    'avatar',
    'role'
])]

#[Hidden([
    'password',
    'remember_token'
])]

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // Relasi User dengan Organization
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }


    // Relasi User dengan Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}