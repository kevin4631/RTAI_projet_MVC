<?php

namespace App\Http\Controllers;

use App\Models\Programmes;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProgrammesController extends Controller
{
    // Requête qui affiche l'ensemble des programmes
    public function all() {
        $programmes = DB::select("SELECT 
                                        p.codeProgramme,
                                        p.nomProgramme,
                                        p.dureeEchange,
                                        d1.nomDiplome AS diplomeUn,
                                        d2.nomDiplome AS diplomeDeux
                                FROM 
                                        Programmes p INNER JOIN Diplomes d1 ON p.codeDiplome = d1.codeDiplome
                                                     INNER JOIN Diplomes d2 ON p.codeDiplome_1 = d2.codeDiplome;");
        return view('programme/programme', ['programmes' => $programmes, 'filtre'=>""]); 
    }

    public function Tri(Request $request) {
        $nomTri = $request->input('nomTriProgramme');
        $programmes = DB::select("SELECT 
                                    p.codeProgramme,
                                    p.nomProgramme,
                                    p.dureeEchange,
                                    d1.nomDiplome AS diplomeUn,
                                    d2.nomDiplome AS diplomeDeux
                                  FROM 
                                    Programmes p INNER JOIN Diplomes d1 ON p.codeDiplome = d1.codeDiplome
                                                 INNER JOIN Diplomes d2 ON p.codeDiplome_1 = d2.codeDiplome
                                  WHERE p.nomProgramme LIKE '%$nomTri%';");
        return view('programme/programme', ['programmes' => $programmes, 'filtre'=>$nomTri]);
    }

    public function RecuperationDiplomes() {
        $diplomes = DB::select("SELECT nomDiplome FROM Diplomes;");
        return view('programme/formulaireCreaProgramme', ['diplomes' => $diplomes]);
    }

    public function CreerProgramme(Request $request) {
        $nom = $request->input("NomProgramme");
        $duree = $request->input("DureeProgramme");
        $diplomeUn = $request->input("DiplomeUn");
        $diplomeDeux = $request->input("DiplomeDeux");

        $codeDUn =  DB::select("SELECT codeDiplome FROM Diplomes WHERE nomDiplome = '$diplomeUn';");
        $codeDDeux = DB::select("SELECT codeDiplome FROM Diplomes WHERE nomDiplome = '$diplomeDeux';");

        $codeUn = $codeDUn[0]->codeDiplome;
        $codeDeux = $codeDDeux[0]->codeDiplome;

        $creation = DB::insert("INSERT INTO Programmes(nomProgramme, dureeEchange, codeDiplome, codeDiplome_1)
                                VALUES ('$nom', $duree, $codeUn, $codeDeux);");

    return redirect()->route('programmes');
    }

    public function SupprimerProgramme($codeProgramme) {
        DB::delete("DELETE FROM DemandesFinancement WHERE codeContrat IN (SELECT codeContrat FROM Contrats WHERE codeDemandeM IN (SELECT codeDemandeM FROM DemandesMobilite WHERE codeProgramme = $codeProgramme));");
        DB::delete("DELETE FROM Contrats WHERE codeDemandeM IN (SELECT codeDemandeM FROM DemandesMobilite WHERE codeProgramme = $codeProgramme);");
        DB::delete("DELETE FROM Concerner WHERE codeDemandeM IN (SELECT codeDemandeM FROM DemandesMobilite WHERE codeProgramme = $codeProgramme);");
        DB::delete("DELETE FROM DemandesMobilite WHERE codeProgramme = $codeProgramme;");
        DB::delete("DELETE FROM Programmes WHERE codeProgramme = $codeProgramme;");
        
 
        return redirect()->route('programmes');
    }

    public function ModifierProgramme($codeProgramme) {
        $programme = DB::select("SELECT 
                                        p.codeProgramme,
                                        p.nomProgramme,
                                        p.dureeEchange,
                                        d1.nomDiplome AS diplomeUn,
                                        d2.nomDiplome AS diplomeDeux
                                FROM 
                                        Programmes p INNER JOIN Diplomes d1 ON p.codeDiplome = d1.codeDiplome
                                                     INNER JOIN Diplomes d2 ON p.codeDiplome_1 = d2.codeDiplome
                                WHERE codeProgramme = $codeProgramme;");
        
        $diplomes = DB::select("SELECT nomDiplome FROM Diplomes;");

        return view('programme/formulaireModifProgramme', ['programme' => $programme, 'diplomes' => $diplomes]);
    }

    public function ModificationProgramme(Request $request) {
        $id = $request->input("codeProgramme");
        $nom = $request->input("NomProgramme");
        $duree = $request->input("DureeProgramme");
        $diplomeUn = $request->input("DiplomeUn");
        $diplomeDeux = $request->input("DiplomeDeux");

        $codeDUn =  DB::select("SELECT codeDiplome FROM Diplomes WHERE nomDiplome = '$diplomeUn';");
        $codeDDeux = DB::select("SELECT codeDiplome FROM Diplomes WHERE nomDiplome = '$diplomeDeux';");

        $codeUn = $codeDUn[0]->codeDiplome;
        $codeDeux = $codeDDeux[0]->codeDiplome;

        $modification = DB::update("UPDATE Programmes SET nomProgramme = '$nom', 
                                                          dureeEchange = $duree, 
                                                          codeDiplome = $codeUn, 
                                                          codeDiplome_1 = $codeDeux 
                                    WHERE codeProgramme = $id");


    return redirect()->route('programmes');
    }
}
