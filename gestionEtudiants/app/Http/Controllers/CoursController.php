<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CoursController extends Controller
{
    public function all(Request $request)
    {

        $env = [
            'filtreNom' => $request->input('nom'),
            'codeDiplome' => $request->codeDiplome,
            'nomDiplome' => ""
        ];

        $filtre = "";

        $sql = "SELECT C.*, D.*
                FROM Cours C, Diplomes D
                WHERE C.codeDiplome = D.codeDiplome";

        if ($env['codeDiplome'] != NULL) {
            $sql = $sql . " AND D.codeDiplome = " . $env['codeDiplome'];
            $nomDiplome = DB::select("SELECT nomDiplome FROM Diplomes WHERE codeDiplome = " . $env['codeDiplome'] . ";");
            $env['nomDiplome'] = $nomDiplome[0]->nomDiplome;
        }

        if ($env['filtreNom'] != NULL) {
            $sql = $sql . " AND LibelleCours LIKE '%" . $env['filtreNom'] . "%'";
        }

        $sql = $sql . " ORDER BY codeCours ASC;";


        $cours = DB::select($sql);
        return view('cours/cours', ['cours' => $cours, 'env' => $env]);
    }

    public function suppCours($codeCours)
    {
        DB::delete("DELETE FROM Compatible WHERE codeCours = $codeCours OR codeCours_1=$codeCours;");
        DB::delete("DELETE FROM Concerner WHERE codeCours = $codeCours;");
        DB::delete("DELETE FROM Cours WHERE codeCours = $codeCours;");
        return redirect()->route('cours.all');
    }

    public function new()
    {
        $listeD = DB::select("SELECT nomDiplome, codeDiplome from Diplomes");
        return view('cours.new', ['listeD' => $listeD]);
    }

    public function create(Request $request)
    {
        $nom = $request->input('LibelleCours');
        $annee = $request->input('annee');
        $nbECTS = $request->input('nbECTS');
        $diplome = $request->input('diplome');

        $insertion = DB::insert(
            "INSERT INTO Cours(LibelleCours, annee, nbECTS, codeDiplome)
            VALUES ('$nom', '$annee', '$nbECTS', '$diplome');"
        );
        return redirect()->route('cours.all');
    }

    public function modif($codeCours)
    {
        $cours = DB::select("SELECT * FROM Cours WHERE codeCours = $codeCours;");
        $D = DB::select("SELECT nomDiplome, codeDiplome from Diplomes");
        return view('cours.modif', ['cours' => $cours, 'D' => $D]);
    }

    public function validation(Request $request)
    {
        $id = $request->input('codeDiplome');
        $codeCours = $request->input('codeCours');
        $nomcours =  $request->input('LibelleCours');
        $annee = $request->input('annee');
        $nbECTS = $request->input('nbECTS');

        $miseajour = DB::update(
            "UPDATE Cours SET 
            codeCours = $codeCours,
            LibelleCours = '$nomcours', 
            annee = $annee,
            nbECTS = $nbECTS,
            codeDiplome=$id
            WHERE codeCours=$codeCours"
        );

        return redirect()->route('cours.all');
    }
}
