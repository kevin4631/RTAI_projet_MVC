<!-- general.css !-->

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
        color: #fff;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #253345;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: #fff;
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
</style>

<header>

    <div class="header_logo">
        <img src="/img/logo_appli.png" />
        <h1>GME</h1>
    </div>
 
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('univs.all') }}">Universités</a></li>
            <li><a href="{{ route('diplomes.all') }}">Diplômes</a></li>
            <li><a href="{{ route('cours.all') }}">Cours</a></li>
            <li><a href="{{ route('programmes') }}">Programmes</a></li>
            <li class="dropdown">
                <a href="#">Gestion demandes et Contrats ▼</a>
                <div class="dropdown-content">
                    <a href="{{ route('mobilites') }}">Demandes de mobilités</a>
                    <a href="{{ route('financements') }}">Demandes de financements</a>
                    <a href="{{ route('contrats') }}">Contrats</a>
                </div>
            </li>
        </ul>
    </nav>

</header>