<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
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
        //        $series = Series::all();
        // Podemos também fazer queries mais complexas:
        $series = Series::all();
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

        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; ++$i) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }

        Season::insert($seasons);
        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; ++$j) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }

        Episode::insert($episodes);

        //        DB::insert('INSERT INTO series(nome) VALUES(?)', [$nomeSerie]);

        //        return redirect('/series');
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' inserida com sucesso!");
    }

    public function destroy(Series $series)
    {
        //        dd($request->serie);
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' excluída com sucesso!");
    }

    public function edit(Series $series)
    {
        //        dd($series->seasons);

        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        //        $previousVersion = Series::find($series->id);
        //        $series->nome = $request->nome;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' editada com sucesso!");
    }
}
