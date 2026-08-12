<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [

        'name',

        'email',

        'no_hp',

        'alamat',

        'foto',

        'role',

        'password',

    ];

    /**
     * Field yang disembunyikan
     */
    protected $hidden = [

        'password',

        'remember_token',

    ];

    /**
     * Cast
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

        ];
    }

    /**
     * Relasi Order
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}