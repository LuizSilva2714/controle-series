<?php

namespace App\Http\Controllers;

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
        //Podemos também fazer queries mais complexas:
        $series = Serie::query()->orderBy('nome')->get();
        //        dd($series); // - para debugar (dump & die)

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();
        //        DB::insert('INSERT INTO series(nome) VALUES(?)', [$nomeSerie]);

        return redirect('/series');
    }
}
