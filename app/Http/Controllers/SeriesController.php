<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        //        $series = [
        //            'Punisher',
        //            'Stranger Things',
        //            'Rings of Power',
        //        ];
        //        $series = DB::select('SELECT nome FROM series;');
        //        $series = Serie::all();
        // Podemos também fazer queries mais complexas:
        $series = Serie::query()->orderBy('nome')->get();
        //        dd($series); // - para debugar (dump & die)
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        //        dd($request->all());
        //        $nomeSerie = $request->input('nome');

        $serie = Serie::create($request->all());
        //        DB::insert('INSERT INTO series(nome) VALUES(?)', [$nomeSerie]);

        //        return redirect('/series');
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' inserida com sucesso!");
    }

    public function destroy(Serie $series)
    {
        //        dd($request->serie);
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' excluída com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        //        $previousVersion = Serie::find($series->id);
        //        $series->nome = $request->nome;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' com sucesso!");
    }
}
