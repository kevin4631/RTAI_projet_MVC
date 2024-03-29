<?php

namespace App\Http\Controllers;

use App\Models\DemandesMobilite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilitesController extends Controller
{

    public function all() {
        $mobilites = DB::select("SELECT DemandesMobilite.codeDemandeM, DemandesMobilite.dateDepotDemandeM, DemandesMobilite.etatDemandeM, DemandesMobilite.numEtudiant, Programmes.nomProgramme
        FROM DemandesMobilite
        JOIN Programmes ON DemandesMobilite.codeProgramme = Programmes.codeProgramme
        ORDER BY DemandesMobilite.codeDemandeM ASC;
        ");

        return view('mobilite/mobilite', ['mobilites' => $mobilites, 'filtre' => ""]);
    }

    public function maj($etat, $codeDM) {
        $miseAJour = DB::select("UPDATE DemandesMobilite
                                 SET etatDemandeM = '$etat'
                                 WHERE codeDemandeM = '$codeDM';
                                ");

        if ($etat == "Acceptée") {

            // Récupérer codeProgramme
            $codeP = DB::select("SELECT codeProgramme FROM DemandesMobilite WHERE codeDemandeM = ?", [$codeDM]);

            if (!empty($codeP)) {
                $codeProgramme = $codeP[0]->codeProgramme;

                // Récupérer dureeEchange
                $dureeResultat = DB::select("SELECT dureeEchange FROM Programmes WHERE codeProgramme = ?", [$codeProgramme]);

                if (!empty($dureeResultat)) {
                    $duree = $dureeResultat[0]->dureeEchange;

                    // Insertion du contrat avec les infos récupérées
                    $contrat = DB::insert("INSERT INTO Contrats (dureeContrat, etatContrat, codeDemandeM) VALUES (?, 'à réaliser', ?)", [$duree, $codeProgramme]);
                }
            }
        }

        return redirect()->route('mobilites');
    }

    public function tri(Request $request) {
        $etat = $request->input('etat');

        $mobilitesTri = DB::select("SELECT DemandesMobilite.codeDemandeM, DemandesMobilite.dateDepotDemandeM, DemandesMobilite.etatDemandeM, DemandesMobilite.numEtudiant, Programmes.nomProgramme
        FROM DemandesMobilite
        JOIN Programmes ON DemandesMobilite.codeProgramme = Programmes.codeProgramme
        WHERE DemandesMobilite.etatDemandeM = '$etat';
        ");

        return view('mobilite/mobilite', ['mobilites' => $mobilitesTri, 'filtre' => "$etat"]);

    }


}