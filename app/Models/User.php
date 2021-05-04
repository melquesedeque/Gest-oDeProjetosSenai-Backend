<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{

    use HasFactory, Notifiable;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'competencias',
        'telefone',
        'status'
    ];

}
