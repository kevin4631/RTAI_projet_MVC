<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> GME - Programme </title>

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
    <h1 class="text_center color_blue"> Programmes </h1>
    <br>


    <div class="center">
      <div id="barre">
        <div class="left">
          <form action="{{ route('programmesTri') }}" method="get">
            <input type="text" placeHolder="Filtrer par nom.." name="nomTriProgramme">
            <input type="submit" value="ok">
          </form>

          @if ($filtre != "")
          <div class="filtre">
            {{ $filtre }}
            <a id="Reinitialisation" href="{{ route('programmes') }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
          </div>
          @endif
        </div>

        <button id="boutonPopup" onclick="showPopup('<?php echo route('programmes.newProgramme'); ?>');"> Ajouter programme <img src="/img/plus.png" alt="Ajouter un programme"></button>
      </div>
    </div>

    <br>
    <br>

    <div class="center">
      <table>
        <thead>
          <tr>
            <th>Code Programme</th>
            <th>Nom Programme</th>
            <th>Durée de l'échange (en mois)</th>
            <th>Diplôme n°1 associé</th>
            <th>Diplôme n°2 associé</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($programmes as $programme)
          <tr>
            <td>{{ $programme->codeProgramme }}</td>
            <td>{{ $programme->nomProgramme }}</td>
            <td>{{ $programme->dureeEchange }}</td>
            <td>{{ $programme->diplomeUn }}</td>
            <td>{{ $programme->diplomeDeux }}</td>
            <td><a id="Modification" class="icon" onclick="showPopup('<?php echo route('modifProgramme', $programme->codeProgramme); ?>');"> <img src="/img/bouton-modifier.png" alt="Modifier le programme"> </a></td>
            <td><a id="Suppression" class="icon" href="{{ route('suppProgramme', $programme->codeProgramme) }}"> <img src="/img/clair.png" alt="Supprimer le programme"></a></td>
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