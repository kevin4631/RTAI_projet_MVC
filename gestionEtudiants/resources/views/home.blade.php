<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestion de la mobilité des étudiants </title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
    <link rel="stylesheet" href="css/general.css" />
</head>

<body>
    @include('headfoot/header')

    <main>
        <h1 class="color_blue text_center"> Gestion de la mobilité des étudiants </h1>

        <div class="center">
            <a class="button" href="{{ route('insert') }}"> Remettre la BDD d'origine</a>
        </div>

        <div class="center">
            <div>
                
            </div>
        </div>


    </main>

    @include('headfoot/footer')
</body>

</html>