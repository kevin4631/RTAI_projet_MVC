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

    .icon_popup{
        display: flex;
        position: absolute;
        top: 20px;
        right: 20px;
    }

</style>

<a class="icon icon_popup" onclick="hiddenPopup()"> <img src="/img/clair.png" alt="fermer popup"></a>

<h1 class="text_center color_blue h1_popup"> Choisir université </h1>

<div class="center">
    <table class="table_popup">
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
                <?php $route = route('diplomes.all', ['codeU' => $univ->codeU, 'nom' => $filtreNom]); ?>
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