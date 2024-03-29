<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplomes</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/icon.css" />
    <link rel="stylesheet" href="css/tableau.css" />
    <link rel="stylesheet" href="css/filtre.css" />

    <link rel="stylesheet" href="css/popup.css" />

</head>

<body>

    @include('headfoot/header')

    <main>
        <br>
        <h1 class="text_center color_blue"> Diplomes <?php if ($env['nomU'] != null) echo (' : ' . $env['nomU']); ?> </h1>
        <br>

        <!-- ***** barre de recherche ***** !-->
        <div class="center">
            <div id="barre">
                <div class="left">

                    <button class="button1" onclick="showPopup('<?php echo route('univs.tab', ['nom' => $env['filtreNom']]); ?>');"> Filtrer par Université <img src="/img/filtre.png"> </button>

                    <!-- formulaire qui gére le filtre par nom !-->
                    <form action="{{ route('diplomes.all') }}" method="get">
                        <!-- si la filtre nomU est present il faut l'envoyer pour le garder avec le filtre par nom !-->
                        @if ($env['nomU'] != null)
                        <input type="hidden" name="codeU" value="{{$env['codeU']}}">
                        @endif
                        <input type="text" placeHolder="Filtrer par nom.." name="nom">
                        <input type="submit" value="ok">
                    </form>

                    <!-- affichage du filtre par nom si il est present !-->
                    @if ($env['filtreNom'] != "" )
                    <div class="filtre">
                        {{ $env['filtreNom'] }}
                        <!-- supression du filtre mais on envoie quand même l'autre filtre pour le garder !-->
                        <a id="Reinitialisation" href="{{ route('diplomes.all', ['codeU' => $env['codeU']]) }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
                    </div>
                    @endif

                    <!-- affichage du filtre par univ si il est present !-->
                    @if ($env['nomU'] != "")
                    <div class="filtre">
                        {{ $env['nomU'] }}
                        <!-- supression du filtre mais on envoie quand même l'autre filtre pour le garder !-->
                        <a id="Reinitialisation" href="{{ route('diplomes.all', ['nom' => $env['filtreNom']]) }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
                    </div>
                    @endif
                </div>

                <button id="boutonPopup" onclick="showPopup('<?php echo route('diplomes.new'); ?>');"> Ajouter diplome <img src="/img/plus.png" alt="Ajouter un programme"></button>
            </div>
        </div>

        <br>
        <br>

        <div class="center">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>niveau</th>
                        <th>Université</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diplomes as $diplome)
                    <?php $route = route('cours.all', ['codeDiplome' => $diplome->codeDiplome]); ?>
                    <tr>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $diplome->codeDiplome }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $diplome->nomDiplome }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $diplome->niveauDiplome }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $diplome->nomU }}</td>
                        <td><a id="Modification" class="icon" onclick="showPopup('<?php echo route('diplomes.modif', $diplome->codeDiplome); ?>');"> <img src="/img/bouton-modifier.png" alt="Modifier le programme"> </a></td>
                        <td><a id="Suppression" class="icon" href="{{ route('diplomes.destroy', $diplome->codeDiplome) }}"> <img src="/img/clair.png" alt="Supprimer le programme"></a></td>
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

</html>