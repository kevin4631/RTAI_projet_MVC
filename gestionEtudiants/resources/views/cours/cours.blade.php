<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/icon.css" />
    <link rel="stylesheet" href="css/tableau.css" />
    <link rel="stylesheet" href="css/filtre.css" />
    <link rel="stylesheet" href="css/popup.css">
</head>

<body>
    @include('headfoot/header')

    <main>
        <br>
        <h1 class="text_center color_blue"> Cours <?php if ($env['codeDiplome'] != null) echo (' : ' . $env['nomDiplome']); ?> </h1>
        <br>

        <div class="center">
            <div id="barre">
                <div class="left">

                    <button class="button1" onclick="showPopup('<?php echo route('diplomes.tab', ['nom' => $env['filtreNom']]); ?>');"> Filtrer par Diplomes <img src="/img/filtre.png"> </button>

                    <!-- formulaire qui gére le filtre par nom !-->
                    <form action="{{ route('cours.all') }}" method="get">
                        <!-- si la filtre nomDiplome est present il faut l'envoyer pour le garder avec le filtre par nom !-->
                        @if ($env['codeDiplome'] != null)
                        <input type="hidden" name="codeDiplome" value="{{$env['codeDiplome']}}">
                        @endif
                        <input type="text" placeHolder="Filtrer par nom.." name="nom">
                        <input type="submit" value="ok">
                    </form>

                     <!-- affichage du filtre par nom si il est present !-->
                     @if ($env['filtreNom'] != "" )
                     <div class="filtre">
                         {{ $env['filtreNom'] }}
                         <!-- supression du filtre mais on envoie quand même l'autre filtre pour le garder !-->
                         <a id="Reinitialisation" href="{{ route('cours.all', ['codeDiplome' => $env['codeDiplome']]) }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
                     </div>
                     @endif

                     <!-- affichage du filtre par diplome si il est present !-->
                    @if ($env['nomDiplome'] != "")
                    <div class="filtre">
                        {{ $env['nomDiplome'] }}
                        <!-- supression du filtre mais on envoie quand même l'autre filtre pour le garder !-->
                        <a id="Reinitialisation" href="{{ route('cours.all', ['nom' => $env['filtreNom']]) }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
                    </div>
                    @endif

                  </div>

                  <button id="boutonPopup" onclick="showPopup('<?php echo route('new'); ?>');"> Ajouter cours <img src="/img/plus.png" alt="Ajouter un programme"></button>

                </div>

            </div>
        </div>

        <br>
        <br>

        <div class="center">
            <table>
                <thead>
                    <tr>
                        <th>Cours</th>
                        <th>Nom</th>
                        <th>ECTS</th>
                        <th>annee</th>
                        <th>Diplomes</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cours as $cours)
                    <tr>
                        <td>{{ $cours->codeCours }}</td>
                        <td>{{ $cours->LibelleCours }}</td>
                        <td>{{ $cours->nbECTS }}</td>
                        <td>{{ $cours->annee }}</td>
                        <td>{{ $cours->nomDiplome }}</td>
                        <td><a id="Modification" class="icon" onclick="showPopup('<?php echo route('modif', $cours->codeCours); ?>');"> <img src="/img/bouton-modifier.png" alt="Modifier le programme"> </a></td>
                        <td><a id="Suppression" class="icon" href="{{ route('delete', $cours->codeCours) }}"> <img src="/img/clair.png" alt="Supprimer le cours"></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- affichage popup !-->
        <div id="blur">
            <div id="popup">
            </div>
        </div>

        <!-- Inclure le fichier JavaScript pour la gestion du popup-->
        <script src="js/gestionPopup.js"></script>
    </main>
    @include('headfoot/footer')
</body>