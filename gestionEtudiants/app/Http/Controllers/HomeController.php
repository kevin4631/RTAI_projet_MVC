<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home()
    {
        return view('home');
    }

    public function insert()
    {
        // Lire le contenu du fichier SQL
        $creation = file_get_contents('sql/creation.sql');
        DB::unprepared($creation);

        // Lire le contenu du fichier SQL
        $insertion = file_get_contents('sql/insertion.sql');
        DB::unprepared($insertion);

        return redirect()->route('home');
    }
}
