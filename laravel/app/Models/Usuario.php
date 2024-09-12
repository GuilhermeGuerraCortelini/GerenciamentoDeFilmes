<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    // Definir a tabela caso não siga o padrão de pluralização
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'username',
        'password', 
        'admin',
    ];
}