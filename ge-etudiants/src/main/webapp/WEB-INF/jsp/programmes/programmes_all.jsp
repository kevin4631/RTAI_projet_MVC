<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
	
<%@ page import="java.util.Collection"%>
<%@ page import="java.util.ArrayList" %>
<%@ page import="fr.jkb.geetudiants.programmes.ProgrammeModel"%>
<%@ page import="fr.jkb.geetudiants.diplomes.DiplomeModel"%>
<%@ page import="fr.jkb.geetudiants.universites.UniversiteModel"%>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Rechercher des programmes d'échanges</title>

<link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
<link rel="stylesheet" href="css/general.css" />
<link rel="stylesheet" href="css/tableau.css" />


</head>
<body>
	<% 
	ArrayList<ProgrammeModel> programmes = (ArrayList<ProgrammeModel>)request.getAttribute("programmes");
	ArrayList<DiplomeModel> diplomes = (ArrayList<DiplomeModel>)request.getAttribute("diplomes");
	ArrayList<UniversiteModel> univs = (ArrayList<UniversiteModel>)request.getAttribute("univs");
	DiplomeModel diplomeEtudiant = (DiplomeModel)request.getAttribute("diplomeEtudiant");
	UniversiteModel univEtudiant = (UniversiteModel)request.getAttribute("univEtudiant");
	%>

	<%@include file="../headfoot/header.jsp"%>
	
	<main>
		<br>
		<h1 class="text_center color_blue">Programmes d'échanges</h1>
		<h3 class="text_center color_blue">rechercher des programmes d'échanges disponible avec votre diplome <%out.print(diplomeEtudiant.getNomDiplome());%>
		de <%out.print(univEtudiant.getNomU());%></h3>
		<br>

		<div class="center">
			<table>
				<thead>
					<tr>
						<th>Programme</th>
						<th>Durée échange</th>
						<th>Diplome d'echange</th>
						<th>Université d'accueil</th>
					</tr>
				</thead>
				<tbody>
				
					<%for(int i=0 ; i<programmes.size() ; i++){%>
					<tr>
						<%String link = "programmes/choix/" + (programmes.get(i).getCodeProgramme());%>
						<td onclick="location.href='<%out.print(link);%>'"><%out.print(programmes.get(i).getNomProgramme());%> </td>
						<td onclick="location.href='<%out.print(link);%>'"><%out.print(programmes.get(i).getDureeEchange());%> mois</td>
						<td onclick="location.href='<%out.print(link);%>'"><%out.print(diplomes.get(i).getNomDiplome());%> </td>			
						<td onclick="location.href='<%out.print(link);%>'"><%out.print(univs.get(i).getNomU());%> </td>									
					</tr>
					<%} %>
				</tbody>
			</table>
		</div>

	</main>
	
	<%@include file="../headfoot/footer.jsp"%>
</body>
</html>