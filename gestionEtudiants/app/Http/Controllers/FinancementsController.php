<?php

namespace App\Http\Controllers;

use App\Financements;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FinancementsController extends Controller
{

    public function all()
    {
        $financements = DB::select("SELECT codeDemandeF, dateDepotDemandeF, etatDemandeF, montantDemandeF, codeContrat, numEtudiant
                                   FROM DemandesFinancement;");

        return view('financement/financement', ['financements' => $financements, 'filtre' => ""]);
    }

    public function maj($etat, $codeDF) {
        $miseAJour = DB::select("UPDATE DemandesFinancement
                                 SET etatDemandeF = '$etat'
                                 WHERE codeDemandeF = '$codeDF';
                                ");

        return redirect()->route('financements');
    }

    public function tri(Request $request) {
        $etat = $request->input('etat');

        $financementsTri = DB::select("SELECT codeDemandeF, dateDepotDemandeF, etatDemandeF, montantDemandeF, codeContrat, numEtudiant
                                   FROM DemandesFinancement
                                   WHERE etatDemandeF = '$etat';");

        return view('financement/financement', ['financements' => $financementsTri, 'filtre' => "$etat"]);

    }

    public function majMontant(Request $request, $codeDF) {
        $montant = $request->input('montant');
        
        $majMontantFinancement = DB::update("UPDATE DemandesFinancement
                                             SET montantDemandeF = '$montant'
                                             WHERE codeDemandeF = '$codeDF';
                                            ");

        return redirect()->route('financements');
    }
}
