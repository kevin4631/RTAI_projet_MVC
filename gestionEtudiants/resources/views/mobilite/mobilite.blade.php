<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GME - mobilités</title>

  <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />

  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/icon.css" />
  <link rel="stylesheet" href="css/tableau.css" />
  <link rel="stylesheet" href="css/filtre.css" />
</head>

<body>
  @include('headfoot/header')

  <main>
    <br>
    <h1 class="text_center color_blue"> Demandes de mobilités </h1>
    <br>

    <div class="center">
      <div id="barre">
        <div class="left">
          <form action="{{ route('mobiliteTri') }}" method="get">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="text" placeHolder="Filtrer par état..." name="etat">
            <input type="submit" value="ok">
          </form>

          @if ($filtre != "")
          <div class="filtre">
            {{ $filtre }}
            <a id="Reinitialisation" href="{{ route('mobilites') }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
          </div>
          @endif
        </div>

      </div>
    </div>


    <br>
    <br>

    <div class="center">
      <table>
        <thead>
          <tr>
            <th>Code Demande</th>
            <th>Date de dépôt de la demande</th>
            <th>Etat</th>
            <th>N°Etudiant associé</th>
            <th>Programme associé</th>

            <th></th>
            <th></th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          @foreach ($mobilites as $mobilite)
          <tr>
            <td>{{ $mobilite->codeDemandeM }}</td>
            <td>{{ $mobilite->dateDepotDemandeM }}</td>
            <td>
              <?php
              if ($mobilite->etatDemandeM == "en cours") {
                echo '<img src="' . asset("img/sablier.png") . '" alt="En cours">';
              } else if ($mobilite->etatDemandeM == "acceptée") {
                echo '<img src="' . asset("img/coche.png") . '" alt="Acceptée">';
              } else if ($mobilite->etatDemandeM == "refusée") {
                echo '<img src="' . asset("img/rejeter.png") . '" alt="Refusée">';
              }
              ?>
            </td>
            <td>{{ $mobilite->numEtudiant }}</td>
            <td>{{ $mobilite->nomProgramme }}</td>
            <td><a id="Refuser" class="icon" href="{{ route('MajMobilite', ['etat' => 'refusée' , 'codeDM' => $mobilite->codeDemandeM]) }}"> <img src="/img/rejeter.png" alt="Refuser"> </a></td>
            <td><a id="En attente" class="icon" href="{{ route('MajMobilite', ['etat' => 'en cours', 'codeDM' => $mobilite->codeDemandeM]) }}"> <img src="/img/sablier.png" alt="En attente"> </a></td>
            <td><a id="Refuser" class="icon" href="{{ route('MajMobilite', ['etat' => 'acceptée', 'codeDM' => $mobilite->codeDemandeM]) }}"> <img src="/img/coche.png" alt="Accepter"> </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>

  @include('headfoot/footer')

</body>

</html>