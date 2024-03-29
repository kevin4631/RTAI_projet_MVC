<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util.Collection" %>
<%@ page import="fr.jkb.geetudiants.financement.FinancementModel" %>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mes demandes de financements</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_appli.png" />
	<link rel="stylesheet" href="css/general.css" />
	<link rel="stylesheet" href="css/tableau.css" />


</head>
<body>

    <header>
        <%@include file="../headfoot/header.jsp"%>
    </header>

    <main>
        <br>
        <h1 class="text_center color_blue">Mes demandes de financements</h1>
        <br>

	<div class="center">

		<table>
            <thead>
                <tr>
                    <th>Code Demande</th>
                    <th>Date Dépôt</th>
                    <th>État</th>
                    <th>Montant</th>
                    <th>Code Contrat</th>
                    <th>Numéro Étudiant</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itérer sur les demandes de financement et afficher chaque demande -->
                <% 
                    Iterable<FinancementModel> demandesFinancement = (Iterable<FinancementModel>) request.getAttribute("demandesFinancement");
                    for (FinancementModel demande : demandesFinancement) { 
                %>
                    <tr>
                        <td><%= demande.getCodeDemandeF() %></td>
                        <td><%= demande.getDateDepotDemandeF() %></td>
                        <td><%= demande.getEtatDemandeF() %></td>
                        <td><%= demande.getMontantDemandeF() %></td>
                        <td><%= demande.getCodeContrat() %></td>
                        <td><%= demande.getNumEtudiant() %></td>
                    </tr>
                <% } %>
            </tbody>
        </table>

</div>
        
    </main>

    <footer>
        <%@include file="../headfoot/footer.jsp"%>
    </footer>

</body>
</html>
