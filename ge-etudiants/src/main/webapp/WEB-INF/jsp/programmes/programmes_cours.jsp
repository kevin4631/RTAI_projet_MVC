<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>

<%@ page import="java.util.Collection"%>
<%@ page import="fr.jkb.geetudiants.cours.CourModel"%>
<%@ page import="fr.jkb.geetudiants.programmes.ProgrammeModel"%>
<%@ page import="fr.jkb.geetudiants.universites.UniversiteModel"%>
<%@ page import="fr.jkb.geetudiants.diplomes.DiplomeModel"%>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Choisir les cours du programmes d'échanges</title>

<link rel="shortcut icon" type="image/x-icon" href="/ge-etudiants/img/logo_appli.png" />
<link rel="stylesheet" href="/ge-etudiants/css/general.css" />

<style>


.recap{
	padding: 50px 50px 50px 50px;
 	background-color: #f6f6f6;
}

form label{
    font-size: 25px;
}

form input{
	margin-left: 50px;
	width:20px;
	height:20px;
    margin-bottom: 30px;
}

form button{
	width: 40%;
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
	<%
	Iterable<CourModel> coursEchange = (Iterable<CourModel>) request.getAttribute("coursEchange");
	ProgrammeModel programmeEchange = (ProgrammeModel) request.getAttribute("programmeEchange");
	UniversiteModel univEchange = (UniversiteModel) request.getAttribute("univEchange");
	DiplomeModel diplomeEchange = (DiplomeModel) request.getAttribute("diplomeEchange");
	%>

	<%@include file="../headfoot/header.jsp"%>

	<main>
			<br>
				<h1 class="text_center">Récapitulatif de votre demande de mobilité</h1>
				
				<div class="center">
					<section class="recap">
						<p><h3>Programme d'échanges demandé :</h3> <%out.print(programmeEchange.getNomProgramme());%></p>
						<p><h3>Université d'accueil :</h3> <%out.print(univEchange.getNomU());%> </p>
						<p><h3>Diplomme à suivre dans l'université d'accueil :</h3> <%out.print(diplomeEchange.getNomDiplome());%> </p>
						<p><h3>Durrée de l'échange :</h3> <%out.print(programmeEchange.getDureeEchange());%> mois </p>
						<h3>Choisir les cours pour le programmes d'échange :</h3>
				
						<form action="/ge-etudiants/programmes/createDemandeMobilite" method="post">
							<input type="hidden" name="codeProgramme" value="<%out.print(programmeEchange.getCodeProgramme());%>">
							<%for (CourModel cour : coursEchange){ %>
								<input type="checkbox" name="choixcours" id="option<%out.print(cour.getCodeCours());%>" value="<%out.print(cour.getCodeCours());%>"> 
					    		<label for="option<%out.print(cour.getCodeCours());%>"><%out.print(cour.getLibelleCours()); %></label>
					    		<br>
							<%} %>
							<div class="center">
								<button type="submit">Valider et envoyer la demande</button>
							</div>
						</form>
					</section>
				</div>
	</main>

	<%@include file="../headfoot/footer.jsp"%>
</body>
</html>