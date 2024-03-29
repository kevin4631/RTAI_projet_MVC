<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universités</title>

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
        <h1 class="text_center color_blue"> Universités </h1>
        <br>

        <div class="center">
            <div id="barre">
                <div class="left">
                    <form action="{{ route('univs.all') }}" method="get">
                        <input type="text" placeHolder="Filtrer par nom.." name="nom">
                        <input type="submit" value="ok">
                    </form>

                    @if ($filtre != "")
                    <div class="filtre">
                        {{ $filtre }}
                        <a id="Reinitialisation" href="{{ route('univs.all') }}"> <img src="/img/croix-noire.png" alt="Réinitialiser les filtres"> </a>
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
                        <th>Code</th>
                        <th>Nom</th>
                        <th>ville</th>
                        <th>pays</th>
                        <th>web</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($univs as $univ)
                    <tr>
                        <?php $route = route('diplomes.all', ['codeU' => $univ->codeU]); ?>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $univ->codeU }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $univ->nomU }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $univ->villeU }}</td>
                        <td onclick="location.href='<?php echo $route; ?>'">{{ $univ->paysU }}</td>
                        <td> <a href="https://{{ $univ->webU }}" target="_blank">{{ $univ->webU }}</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
    @include('headfoot/footer')
</body>

</html>