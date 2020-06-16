<html>


<head>
	<title>Accueil</title>
	<link href="sources/discussion.css" rel="stylesheet">
</head>

	<body class="accueil">

		<header>
			<ul class="ul4"> 
<?php
session_start();
if(!empty($_POST['deco']))
{
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	unset($_SESSION['profil']);
}


if((isset($_SESSION['login']))&&(isset($_SESSION['password'])))
{
?>
	<li><a href="sources/profil.php">Profil </a></li>
	<li><a href="sources/discussion.php">Discussions </a></li>

<div class="button">
	<form class="déconnexion" method="post" action="index.php">
		<input type="submit" name="deco" value="Déconnexion">
	</form>
</div>
<?php

}       
else
{
?>
	<li><a href="sources/connexion.php">Connexion</a></li>	
	<li><a href="sources/inscription.php">Inscription</a></li>
	<li><a href="sources/discussion.php">Discussion</a></li>
	
	

			</ul>
<?php	
}	

?>

		</header>

<div class="hautpage">
</div>

<article class="textpresentation">
	<div class="milieupage">
		<p>FIFA 20 est un jeu vidéo de football développé par EA Canada et EA Roumanie et édité par EA Sports.</p> 
		<p>La date de sortie du jeu, annoncée à l'E3 2019, est prévue le 27 septembre 2019 sur PC, PlayStation 4, Xbox One et Nintendo Switch.</p>
		<p>Le jeu sera également disponible le 19 septembre pendant 10 heures pour les joueurs bénéficiant de L'EA Access ou de l'Origin Access.</p>
		<p>Une démo du jeu est disponible depuis le 10 septembre. </p>
		<p>Trois versions différentes de cet opus sont disponibles en précommande : l'édition Standard, l'édition Champions et l'édition Ultimate.</p>
		<p>Il s'agit du vingt-septième opus de la franchise FIFA développé par EA Sports.</p>
        <p>Il s'agit du quatrième opus de la série FIFA utilisant le moteur de jeu Frostbite après FIFA 17, FIFA 18 et FIFA 19.</p>
        <p>Pour la jaquette du jeu, trois joueurs différents sont à l’honneur, un pour chaque édition :</p>
		<p>Eden Hazard pour l'édition standard, Virgil van Dijk pour l'édition Champions et Zinédine Zidane pour l'édition Ultimate.</p>
	</div>
</article>
<article class="carte">
	<div class="milieupage">
		<p>Alors que, PS4, PC et Xbox One posséderont toutes les nouvelles fonctionnalités,</p>
		<p>la version pour Switch sera plutôt une mise à jour du jeu FIFA 19 avec les nouveaux maillots et effectifs.</p>
		<p>Le mode Volta ne sera donc pas disponible sur cette plateforme, Mathilde Vicente,</p>
		<p>« Tout ce que l'on sait sur les nouveautés de la 20ème édition du jeu FIFA » [archive], sur Tech Advisor (consulté le 17 juin 2019).</p>		
	</div>
</article>


<article class="basdepage">
	</div>
</article>


<footer>
Hélio-Discussion Fifa 20
</footer>

	</body>	
</html>