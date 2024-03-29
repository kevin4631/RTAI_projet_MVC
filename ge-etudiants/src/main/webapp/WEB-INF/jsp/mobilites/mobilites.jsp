<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util.Collection" %>
<%@ page import="fr.jkb.geetudiants.mobilites.MobiliteModel" %>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demande de mobilite</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
	<link rel="stylesheet" href="css/general.css" />
	<link rel="stylesheet" href="css/tableau.css" />
</head>

<style>
.Valider-btn {
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
<body>

        <%@include file="../headfoot/header.jsp"%>

    <main>
        <br>
        <h1 class="text_center color_blue">Mes demandes de mobilité</h1>
        <br>

        <div class="center">
        
        <table>
            <thead>
                <tr>
                    <th>Code Demande</th>
                    <th>Date Dépôt Demande</th>
                    <th>État Demande</th>
                    <th>Numéro Étudiant</th>
                    <th>Code Programme</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over the mobilites and display each mobilite -->
				<%
				Iterable<MobiliteModel> mobilites = (Iterable<MobiliteModel>) request.getAttribute("mobilites");

				for (MobiliteModel mobilite : mobilites) {
				%>
				<tr>
					<td><%=mobilite.getCodeDemandeM()%></td>
					<td><%=mobilite.getDateDepotDemandeM()%></td>
					<td><%=mobilite.getEtatDemandeM()%></td>
					<td><%=mobilite.getNumEtudiant()%></td>
					<td><%=mobilite.getCodeProgramme()%></td>
					<%
					if (mobilite.getEtatDemandeM().equals("acceptée")) {
					%>
					<td>
						<form action="create-contrat" method="post">
							<input type="hidden" name="codeDemandeM" value="<%= mobilite.getCodeDemandeM() %>">
							<input type="hidden" name="codeProgramme" value="<%= mobilite.getCodeProgramme() %>">
							<button class="Valider-btn" type="submit">Valider</button>
						</form>
					</td>

					<%
					} else {
					%>
					<td></td>
					<%
					}
					%>
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
