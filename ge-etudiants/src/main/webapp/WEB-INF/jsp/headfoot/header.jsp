<!-- general.css !-->
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
	
<%@ page import="fr.jkb.geetudiants.session.SessionBean" %>
	
<style>
nav {
	font-size: medium;
	/*background-color: #333;
    */
}

nav ul {
	padding: 0;
	display: flex;
	list-style-type: none;
}

nav ul li {
	padding-left: 30px;
	padding-right: 30px;
}

nav ul li a {
	text-decoration: none;
    color: #253345;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #e8edff;
	box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
	z-index: 1;
}

.dropdown-content a {
	color: #253345;
	padding: 20px;
	display: block;
	text-decoration: none;
}

nav a:hover {
	color: orange;
	border-bottom: 2px solid gold;
}

.dropdown:hover .dropdown-content {
	display: block;
}

#deco{
	border-radius: 10px;
    position: absolute;
    top : 30px;
    right: 20px;
    background-color: #000091;
    color: white;
    font-weight: bold;
    padding-top: 10px;
    padding-bottom: 10px;
}

#deco:hover {
    background-color: #1212ff;
}

</style>

<header>

	<div class="header_logo">
		<img src="/ge-etudiants/img/logo_appli.png" />
		<h1>GME</h1>
	</div>


	<% SessionBean sessionBean = (SessionBean) session.getAttribute("sessionBean");
	if (sessionBean != null) {%>
	<nav>
		<ul>
			<li><a href="/ge-etudiants/home">Mon tableau de bord </a></li>
			<li><a href="/ge-etudiants/programmes">Rechercher des programmes d'échanges</a></li>			
			<li class="dropdown">
                <a href="#">Consultation ▼</a>
                <div class="dropdown-content">
                    <a href="/ge-etudiants/mobilites">Mes demandes de mobilités</a>
                    <a href="/ge-etudiants/contrats">Mes contrats</a>
                    <a href="/ge-etudiants/demandes-financement">Mes demandes de financements</a>
                </div>
            </li>
		</ul>
	</nav>
	
	<a href="/ge-etudiants/deconnexion"><button id="deco"> Déconnexion</button></a>
	<%}else{%>
	<a href="/ge-etudiants/connexion"><button id="deco"> Connexion</button></a>	
	<%}%>

</header>


