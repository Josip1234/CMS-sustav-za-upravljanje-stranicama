<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dbirth',
        'sex',
        'utype',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        //datum rođenja se prikazuje kao date, spol treba biti string npr muški ženski,
        //usertype treba biti string admin, korisnik, status aktivan, neaktivan, 
        //zabranjen
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dbirth'=>'date',
            'sex'=>'string',
            'utype'=>'string',
            'status'=>'string'
        ];
    }
}
