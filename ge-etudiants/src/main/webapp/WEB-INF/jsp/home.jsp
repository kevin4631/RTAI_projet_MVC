<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
	
<%@ page import="fr.jkb.geetudiants.etudiants.EtudiantModel"%>	
	
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mon tableu de bord</title>

<link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
<link rel="stylesheet" href="css/general.css" />

<style>
section {
	margin-top: 100px;
	margin-left: 10%;
}
</style>

</head>
<body>

	<%@include file="headfoot/header.jsp"%>
	<%
	EtudiantModel etudiant = (EtudiantModel)request.getAttribute("etudiant");
	%>

	<main>
		<section>
			<h1>Bienvenue <%out.print(etudiant.getNomEtudiant());%></h1>
			<h1>Mon tableau de bord</h1>
			<p>Retrouvez ici les informations et outils importants concernant
				la procédure des échanges.</p>
			<h2>Mes informations</h2>
			<p>Consultez vos informations sur la procédure des échanges.</p>
		</section>

	</main>

	<%@include file="headfoot/footer.jsp"%>


</body>
</html>