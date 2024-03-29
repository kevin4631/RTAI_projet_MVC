<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Universites;


class UnivsController extends Controller
{
    public function all(Request $request)
    {
        $filtre="";

        $sql = "SELECT * FROM Universites;";

        if (!empty($request) && !empty($request->input('nom'))) {
            $filtre = $request->input('nom');

            $sql = "SELECT * 
            FROM Universites 
            WHERE nomU LIKE '%$filtre%';";
        }

        $univs = DB::select($sql);
        return view('univs/univs_all', ['univs' => $univs, 'filtre' => $filtre]);
    }


    public function tab(Request $request)
    {
        $filtreNom = $request->input('nom');
        
        $sql = "SELECT * FROM Universites;";

        $univs = DB::select($sql);
        return view('univs/univs_tab', ['univs' => $univs, 'filtreNom' => $filtreNom]);
    }

}
