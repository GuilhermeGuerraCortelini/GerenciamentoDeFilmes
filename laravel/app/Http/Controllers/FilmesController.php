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

    public function galeria(){
        return view('galeria.index');
    }
    public function cadastrar()
    {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $request)
    {
        // php artisan storage:link
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'sinopse' => 'required|max:255',
            'ano' => 'required|date',
            'categoria' => 'required|max:255',
            'capa' => 'required',
            'link_trailer' => 'required|string|max:255',
        ]);
        $path = $request->file('capa')->store('CapasFilmes', 'public');

        $validated['capa'] = $path;
        Filme::create($validated);

        return redirect()->route('filmes')->with('sucesso', 'Filme criado com sucesso!');
    }

    public function editar(Filme $filme)
    {
        return view('filmes.editar', ['filme' => $filme]);
    }

    public function atualizar(Request $request, Filme $filme)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'sinopse' => 'required|max:255',
            'ano' => 'required|date',
            'categoria' => 'required|max:255',
            'capa' => 'nullable|image',  
            'link_trailer' => 'required|string|max:255',
        ]);

        if ($request->hasFile('capa')) {
            // Deleta a capa antiga se existir
            if ($filme->capa && \Storage::disk('public')->exists($filme->capa)) {
                \Storage::disk('public')->delete($filme->capa);
            }
            // Salva a nova capa
            $path = $request->file('capa')->store('CapasFilmes', 'public');
            $validated['capa'] = $path;
        }

        $filme->update($validated);

        return redirect()->route('filmes')->with('sucesso', 'Filme atualizado com sucesso!');
    }

    public function apagar(Filme $filme) {

        if ($filme->capa && \Storage::disk('public')->exists($filme->capa)) {
            // Remove o arquivo da capa do disco
            \Storage::disk('public')->delete($filme->capa);
        }
        $filme->delete();
        return redirect()->route('filmes')->with('sucesso', 'Filme excluído com sucesso!');
    }


}
