<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ page import="java.util.Collection"%>
<%@ page import="java.util.List"%>
<%@ page import="fr.jkb.geetudiants.contrats.ContratModel"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Consultation des Contrats</title>

<link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
<link rel="stylesheet" href="css/general.css" />
<link rel="stylesheet" href="css/tableau.css" />

<style>
.dmdF-btn {
	background-color: #4CAF50;
	color: white;
	padding: 10px 20px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	cursor: pointer;
	border-radius: 10px;
}
</style>
</head>
<body>

	<%@include file="../headfoot/header.jsp"%>

	<main>
		<br>
		<h1 class="text_center color_blue">Mes Contrats</h1>
		<br>

		<div class="center">
			<table>
				<thead>
					<tr>
						<th>Code Contrat</th>
						<th>Durée Contrat</th>
						<th>État Contrat</th>
						<th>Code Demande Mobilité</th>
						<th>Nom Programme</th>
						<th>Demande Financement</th>
					</tr>
				</thead>
				<tbody>
					<%
					Iterable<ContratModel> contrats = (Iterable<ContratModel>) request.getAttribute("contrats");
					List<String> nomProgrammes = (List<String>) request.getAttribute("nomProgrammes");
					int i = 0;
					for (ContratModel contrat : contrats) {
					%>
					<tr>
						<td><%=contrat.getCodeContrat()%></td>
						<td><%=contrat.getDureeContrat()%> mois</td>
						<td><%=contrat.getEtatContrat()%></td>
						<td><%=contrat.getCodeDemandeM()%></td>
						<td><%=nomProgrammes.get(i++)%></td>
						<td>
							<form action="/ge-etudiants/creation-financement" method="post">
							    <input type="hidden" name="codeContrat" value="<%= contrat.getCodeContrat() %>">
							    <button type="submit" class="dmdF-btn">Demander votre Financement</button>
							</form>

						</td>
					</tr>
					<%
					}
					%>
				</tbody>
			</table>
		</div>
	</main>

	<%@include file="../headfoot/footer.jsp"%>

</body>
</html>
