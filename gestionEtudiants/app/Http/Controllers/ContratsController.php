<?php

namespace App\Http\Controllers;

use App\Models\Contrats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ContratsController extends Controller
{
    public function all() {
        $contrats = DB::select("SELECT * FROM Contrats");

        return view('contrats/contrat', ['contrats' => $contrats, 'filtre' => ""]);
    }

    public function maj($etat, $codeC) {
        $miseAJour = DB::select("UPDATE Contrats
        SET etatContrat = '$etat'
        WHERE codeContrat = '$codeC';
       ");

return redirect()->route('contrats');

    }

    public function tri(Request $request) {
        $etat = $request->input('etat');

        $contratsTri = DB::select("SELECT * FROM Contrats WHERE etatContrat = '$etat';");

        return view('contrats/contrat', ['contrats' => $contratsTri, 'filtre' => "$etat"]);

    }
}