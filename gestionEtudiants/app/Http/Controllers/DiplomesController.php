<?php

namespace App\Http\Controllers;

use App\Diplomes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DiplomesController extends Controller
{
    public function all(Request $request)
    {
        $env = [
            'filtreNom' => $request->input('nom'),
            'codeU' => $request->codeU,
            'nomU' => ""
        ];

        $sql = "SELECT codeDiplome, nomDiplome, niveauDiplome, nomU 
        FROM Diplomes, Universites 
        WHERE Diplomes.codeU = Universites.codeU";

        if ($env['codeU'] != NULL) {
            $sql = $sql . " AND Universites.codeU = " . $env['codeU'];
            $nomU = DB::select("SELECT nomU FROM Universites WHERE codeU = " . $env['codeU'] . ";");
            $env['nomU'] = $nomU[0]->nomU;
        }
        if ($env['filtreNom'] != NULL) {
            $sql = $sql . " AND nomDiplome LIKE '%" . $env['filtreNom'] . "%'";
        }
        $sql = $sql . " ORDER BY codeDiplome ASC;";


        $diplomes = DB::select($sql);
        return view('diplomes/diplomes_all', ['diplomes' => $diplomes, 'env' => $env]);
    }

    public function tab(Request $request)
    {
        $filtreNom = $request->input('nom');

        $sql = "SELECT codeDiplome, nomDiplome, niveauDiplome, nomU 
        FROM Diplomes, Universites 
        WHERE Diplomes.codeU = Universites.codeU;";

        $diplomes = DB::select($sql);
        return view('diplomes/diplomes_tab', ['diplomes' => $diplomes, 'filtreNom' => $filtreNom]);
    }

    public function modif($codeDiplome)
    {
        $diplome = DB::select("SELECT * FROM Diplomes WHERE codeDiplome = $codeDiplome;");
        $univs = DB::select("SELECT nomU, codeU FROM Universites;");
        return view('diplomes/diplomes_modif', ['diplome' => $diplome, 'univs' => $univs]);
    }

    public function valideModif(Request $request)
    {
        $id = $request->input('codeDiplome');
        $nom = $request->input('nomDiplome');
        $niveau =  $request->input('niveauDiplome');
        $univ =  $request->input('codeU');

        $modification = DB::update(
            "UPDATE Diplomes SET 
            nomDiplome = '$nom', 
            niveauDiplome = '$niveau', 
            codeU = $univ
            WHERE codeDiplome = $id"
        );

        return redirect()->route('diplomes.all');
    }

    public function new()
    {
        $univs = DB::select("SELECT nomU, codeU FROM Universites;");
        return view('diplomes/diplomes_new', ['univs' => $univs]);
    }

    public function create(Request $request)
    {
        $nom = $request->input('nomDiplome');
        $niveau =  $request->input('niveauDiplome');
        $univ =  $request->input('univ');

        $creation = DB::insert(
            "INSERT INTO Diplomes(nomDiplome, niveauDiplome, codeU)
            VALUES ('$nom', '$niveau', $univ);"
        );

        return redirect()->route('diplomes.all');
    }

    public function destroy($codeDiplome)
    {
        $programmes = DB::select(
            "SELECT codeProgramme 
            FROM Programmes
            WHERE codeDiplome = $codeDiplome
            OR codeDiplome_1 = $codeDiplome;"
        );

        foreach ($programmes as $programme) {
            $demandesMobilites = DB::select(
                "SELECT codeDemandeM 
                FROM DemandesMobilite
                WHERE codeProgramme = $programme->codeProgramme;"
            );

            foreach ($demandesMobilites as $demandesMobilite) {

                $contrats = DB::select(
                    "SELECT codeContrat
                    FROM Contrats
                    WHERE codeDemandeM = $demandesMobilite->codeDemandeM;"
                );

                foreach ($contrats as $contrat) {
                    DB::select(
                        "DELETE FROM DemandesFinancement
                        WHERE codeContrat = $contrat->codeContrat;"
                    );
                }

                DB::select(
                    "DELETE FROM Contrats
                    WHERE codeDemandeM = $demandesMobilite->codeDemandeM;"
                );

                DB::select(
                    "DELETE FROM Concerner
                    WHERE codeDemandeM = $demandesMobilite->codeDemandeM;"
                );
            }

            DB::select(
                "DELETE FROM DemandesMobilite
                WHERE codeProgramme = $programme->codeProgramme;"
            );
        }

        DB::select(
            "DELETE FROM Programmes
            WHERE codeDiplome = $codeDiplome
            OR codeDiplome_1 = $codeDiplome;"
        );

        $etudiants = DB::select(
            "SELECT numEtudiant 
            FROM Etudiants
            WHERE codeDiplome = $codeDiplome;"
        );

        foreach ($etudiants as $etudiant) {
            DB::select(
                "DELETE FROM DemandesFinancement
                WHERE numEtudiant = '$etudiant->numEtudiant';"
            );

            $demandesMobilites = DB::select(
                "SELECT codeDemandeM 
                FROM DemandesMobilite
                WHERE numEtudiant =  '$etudiant->numEtudiant';"
            );

            foreach ($demandesMobilites as $demandesMobilite) {
                DB::select(
                    "DELETE FROM Contrats
                    WHERE codeDemandeM = '$demandesMobilite->codeDemandeM';"
                );
            }

            DB::select(
                "DELETE FROM DemandesMobilite
                WHERE numEtudiant = '$etudiant->numEtudiant';"
            );
        }

        DB::select(
            "DELETE FROM Etudiants
            WHERE codeDiplome = $codeDiplome;"
        );


        $cours = DB::select(
            "SELECT codeCours 
            FROM Cours
            WHERE codeDiplome = $codeDiplome;"
        );

        foreach ($cours as $cour) {
            DB::select(
                "DELETE FROM Concerner
                WHERE codeCours = $cour->codeCours;"
            );

            DB::select(
                "DELETE FROM Compatible
                WHERE codeCours = $cour->codeCours
                OR codeCours_1 = $cour->codeCours;"
            );
        }

        DB::select(
            "DELETE FROM Cours
            WHERE codeDiplome = $codeDiplome;"
        );

        DB::select(
            "DELETE FROM Diplomes
            WHERE codeDiplome = $codeDiplome;"
        );

        return redirect()->route('diplomes.all');
    }
}
