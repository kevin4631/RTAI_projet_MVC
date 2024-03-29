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
	
	form{
		padding : 80px 80px 80px 80px;
		margin-top : 50px;
		background-color: #f6f6f6;
	}
	
	form input{
		width: 100%;
		padding-top: 10px;
		padding-bottom: 10px;
		border : none;
	    border-bottom: 3px solid black;
	    
	}
	
	form button{
		width: 100%;
		color : #fff;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #000091;
		font-weight: bold;
		
	}
	
	form button:hover{
		background-color: #1212ff;
	}
	
	
	</style>
	
	</head>
	<body>
	
		<%@include file="../headfoot/header.jsp"%>
	
		<main>
			<div class="connexion">
				
				
			<form action="/ge-etudiants/inscription" method="post">
		
					<h2>La plateforme nationale des programmes des échanges</h2>
					<br>
					<h2>Crée votre compte</h2>
	
	
					<p>Votre numéro étudiant (INE)</p>
					<input class="input" type="text" placeHolder="Nunéro INE" name="numEtudiant" required="required">
					
					<p>Votre Nom</p>
					<input class="input" type="text" placeHolder="Nom" name="nomEtudiant" required="required">
					
					<p>Votre Prénom</p>
					<input class="input" type="text" placeHolder="Prénom" name="prenomEtudiant" required="required">
					
					<p>Votre adresse mail</p>
					<input class="input" type="text" placeHolder="Adresse mail" name="mailEtudiant" required="required">
					
					<p>Année Diplome</p>
					<input class="input" type="number" placeHolder="année" name="annee" required="required">
					
					<p>Votre Diplome</p>
					<input class="input" type="text"  placeHolder="Nom Diplome" name="nomDiplome" required="required">
					<br>
					<br>
					<br>
					<button type="submit">Inscription</button>
				</form>
			</div>
	
		</main>
	
		<%@include file="../headfoot/footer.jsp"%>
	
	
	</body>
	</html>