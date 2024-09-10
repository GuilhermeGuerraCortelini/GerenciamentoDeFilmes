<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(){
        $dados = Filme::all();

        return view('filmes.index', [
            'filmes'=> $dados
        ]);
    }
}
