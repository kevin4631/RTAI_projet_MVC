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

<h1 class="font h1"> Modification Programme </h1>

<form class="form" method="get">
    <input class="input" type="hidden" value="{{ $programme[0]->codeProgramme }}" name="codeProgramme">
    <input class="input" type="text" value="{{ $programme[0]->nomProgramme }}" name="NomProgramme" >
    <input class="input" type="number" value="{{ $programme[0]->dureeEchange }}" name="DureeProgramme" >
    <select id="ListeDiplome" name="DiplomeUn">
        <option value="{{ $programme[0]->diplomeUn}}"> {{ $programme[0]->diplomeUn}} </option>
        @foreach ($diplomes as $diplome)
        <?php if ($programme[0]->diplomeUn != $diplome->nomDiplome) { ?>
        <option value="{{ $diplome->nomDiplome }}">{{ $diplome->nomDiplome }}</option>
        <?php } ?>
        @endforeach
    </select>
    <select id="ListeDiplome" name="DiplomeDeux">
    <option value="{{ $programme[0]->diplomeDeux}}"> {{ $programme[0]->diplomeDeux}} </option>
        @foreach ($diplomes as $diplome)
        <?php if ($programme[0]->diplomeDeux != $diplome->nomDiplome) { ?>
        <option value="{{ $diplome->nomDiplome }}">{{ $diplome->nomDiplome }}</option>
        <?php } ?>
        @endforeach
       
    </select>
    <input class="input" formaction="{{ route('modificationProgramme') }}" type="submit" value="Modifier">
    <button class="annuler" type="button" onclick="hiddenPopup();"> Annuler Modification </button>

</form>