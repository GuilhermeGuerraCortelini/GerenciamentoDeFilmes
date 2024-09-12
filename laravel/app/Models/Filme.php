<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    // Definindo o nome da tabela
    protected $table = 'filmes';
    public $timestamps = false;
    // Campos que podem ser preenchidos via mass-assignment
    protected $fillable = [
        'nome',
        'sinopse',
        'ano',
        'categoria',
        'capa',
        'link_trailer',
    ];
}
