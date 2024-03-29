<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Connexion</title>

<link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
<link rel="stylesheet" href="css/general.css" />

<style>
.connexion {
    display: flex;
    justify-content: center;
}

form {
    padding: 80px 80px 20px 80px;
    margin-top: 50px;
    background-color: #f6f6f6;
}

form input {
    width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    border: none;
    border-bottom: 3px solid black;
}

form button {
    width: 100%;
    color: #fff;
    padding-top: 10px;
    padding-bottom: 10px;
    background-color: #000091;
    font-weight: bold;
}

form button:hover {
    background-color: #1212ff;
}

.inscription {
    width: 80%;
    margin-left:80px;
    margin-right:10px; 
    margin-bottom:20px;
    color: #fff;
    padding-top: 10px;
    padding-bottom: 10px;
    buttom: 20px;
    background-color: #000091;
    font-weight: bold;
}

.inscription:hover {
    background-color: #1212ff;
}

.inscription a {
    color: white;
    text-decoration: none;
}

.background{
    background-color: #f6f6f6;
}

</style>

</head>
<body>

    <%@include file="../headfoot/header.jsp"%>

    <main>
        <div class="connexion">
            <div>

                <form action="/ge-etudiants/connexion" method="post">

                    <h2>La plateforme nationale des programmes des échanges</h2>
                    <br>
                    <h2>Se connecter avec son compte</h2>

                    <p>Votre adresse mail</p>
                    <input class="input" type="text" placeHolder="Adresse mail"
                        name="mailEtudiant" required="required">

                    <p>Votre mot de passe</p>
                    <input class="input" type="text" placeHolder="Nunéro INE"
                        name="numEtudiant" required="required"> <br> <br>
                    <button type="submit">Se connecter</button>
                </form>
                
                <div class="background">
                    <a href="/ge-etudiants/inscription">
                     <button class="inscription" type="button" >
                        S'inscrire
                    </button>
                    
                    </a>
                </div>

            </div>


        </div>

    </main>


    <%@include file="../headfoot/footer.jsp"%>


</body>
</html>
