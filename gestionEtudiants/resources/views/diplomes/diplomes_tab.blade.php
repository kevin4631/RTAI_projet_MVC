<style>
    #popup {
        border-radius: 8px;
        padding: 15px;
    }

    .table_popup {
        width: 100%;
    }

    .h1_popup {
        margin: 0 0 15px 0;
    }

    .icon_popup {
        display: flex;
        position: absolute;
        top: 20px;
        right: 20px;
    }
</style>

<a class="icon icon_popup" onclick="hiddenPopup()"> <img src="/img/clair.png" alt="fermer popup"></a>

<h1 class="text_center color_blue"> Choisir Diplomes </h1>

<div class="center">
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>niveau</th>
                <th>Université</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diplomes as $diplome)
            <?php $route = route('cours.all', ['codeDiplome' => $diplome->codeDiplome, 'nom' => $filtreNom]); ?>
            <tr onclick="location.href='<?php echo $route; ?>'">
                <td>{{ $diplome->codeDiplome }}</td>
                <td>{{ $diplome->nomDiplome }}</td>
                <td>{{ $diplome->niveauDiplome }}</td>
                <td>{{ $diplome->nomU }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>