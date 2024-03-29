<style>
    /* Style général du formulaire */
    .form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* Style des champs de texte */
    .input[type="text"],
    .input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    /* Style des options du menu déroulant */
    select option {
        padding: 10px;
    }

    /* Style du bouton */
    .input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Style du bouton au survol */
    .input[type="submit"]:hover {
        background-color: #45a049;
    }

    .h1 {
        display: flex;
        justify-content: center;
    }

    .annuler{
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: #c40000;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        color: white;
    }

    .annuler:hover {
        background-color: #910000;
    }


</style>

<h1 class="font h1"> Modifier diplome n°{{ $diplome[0]->codeDiplome }}</h1>

<form class="form" method="get">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <input name="codeDiplome" type="hidden" value="{{ $diplome[0]->codeDiplome }}">
    <input class="input" type="text" value="{{ $diplome[0]->nomDiplome }}" name="nomDiplome">

    <?php $niveaux = array("Licence", "Master", "Doctorat"); ?>

    <select id="ListeDiplome" name="niveauDiplome">
        @foreach ($niveaux as $niveau)
            @if ($niveau == $diplome[0]->niveauDiplome)
                <option selected="=selected" value="{{$niveau}}">{{$niveau}}</option>
            @else
                <option  value="{{$niveau}}">{{$niveau}}</option>
            @endif
        @endforeach
    </select>

    <select id="ListeDiplome" name="codeU">
        @foreach ($univs as $univ)
            @if ($univ->codeU == $diplome[0]->codeU)
                <option selected="=selected" value="{{ $univ->codeU }}">{{ $univ->nomU }}</option>
            @else
                <option  value="{{ $univ->codeU }}">{{ $univ->nomU }}</option>
            @endif
        @endforeach
    </select>

    <input class="input" type="submit" value="Valider Modification" formaction="{{ route('diplomes.valideModif') }}">
    <button class="annuler" type="button" onclick="hiddenPopup();"> Annuler modification </button>

</form>

