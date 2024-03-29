
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

    .input[type="text"],
    .input[type="number"],
    select {
        color: red;
    }
</style>


    
<h1 class="font h1"> Modifier cours n°{{ $cours[0]->codeCours }}</h1>

<form class="form" method="get">
    @csrf

    <input class="input"type="hidden" value="{{ $cours[0]->codeCours}}" name="codeCours">
    <input class="input"type="text" value="{{ $cours[0]->LibelleCours}}" name="LibelleCours">
    <input class="input" type="number" value="{{ $cours[0]->annee }}" name="annee">
    <input class="input" type="number" value="{{ $cours[0]->nbECTS }}" name="nbECTS">

    <select id="ListeDiplome" name="codeDiplome">
        @foreach ($D as $diplome)
            @if ($cours[0]->codeDiplome == $diplome->codeDiplome)
                <option selected="selected" value="{{ $diplome->codeDiplome }}">{{ $diplome->nomDiplome }}</option>
            @else
                <option value="{{ $diplome->codeDiplome }}">{{ $diplome->nomDiplome }}</option>
            @endif
        @endforeach
    </select>
    
    <input class="input" type="submit" value="Modifier" formaction="{{route('validation')}}">
    <button class="annuler" type="button" onclick="hiddenPopup();"> Annuler modification </button>
</form>


