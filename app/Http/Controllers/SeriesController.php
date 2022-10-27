<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Punisher',
            'Stranger Things',
            'Rings of Power',
        ];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>{$serie}</li>";
        }
        $html .= '</ul>';

        return response($html, 200, []);
    }
}
