<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> GME - Contrats </title>

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
    <h1 class="text_center color_blue"> Contrats </h1>
    <br>

    <div class="center">
      <div id="barre">
        <div class="left">
          <form action="{{ route('contratTri') }}" method="get">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="text" placeHolder="Filtrer par état..." name="etat">
            <input type="submit" value="ok">
          </form>

          @if ($filtre != "")
          <div class="filtre">
            {{ $filtre }}
            <a id="Reinitialisation" href="{{ route('contrats') }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
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
            <th>Code Contrat</th>
            <th>Durée Contrat</th>
            <th>Etat</th>
            <th>Demande Mobilité associée</th>
            
            
            <th></th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($contrats as $contrat)
          <tr>
            <td>{{ $contrat->codeContrat }}</td>
            <td>{{ $contrat->dureeContrat }}</td>
            <td>
            <?php
if ($contrat->etatContrat == "A réaliser") {
  echo '<img src="' . asset("img/rejeter.png") . '" alt="à réaliser">';
}            
else if ($contrat->etatContrat == "En cours") {
    echo '<img src="' . asset("img/sablier.png") . '" alt="En cours">';
}
else if ($contrat->etatContrat == "Réalisé") {
  echo '<img src="' . asset("img/coche.png") . '" alt="Acceptée">';
}

?>
            </td>
            <td>{{ $contrat->codeDemandeM }}</td>
            <td><a id="En attente" class="icon"  href="{{ route('MajContrat', ['etat' => 'En cours', 'codeC' => $contrat->codeContrat]) }}"> <img src="/img/sablier.png" alt="En attente"> </a></td>
            <td><a id="Terminé" class="icon"  href="{{ route('MajContrat', ['etat' => 'Terminé', 'codeC' => $contrat->codeContrat]) }}"> <img src="/img/coche.png" alt="Terminé"> </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>

  @include('headfoot/footer')

</body>

</html>