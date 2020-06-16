<html>

<head>
<link href="discussion.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>Connexion</title>
</head>

	<body class="connexion">
		<header>	
			<ul class="ul">
				<li><a href="../index.php">Accueil</a></li>
				<li><a href="inscription.php">S'inscrire</a></li>
			</ul>
		</header>


<article class="form">
	<div class="form-style-9">
		<h2>Connectez-vous !</h2>
		<form class="connexionform" method="post" action="connexion.php"> 


<?php

session_start ();

if(isset($_SESSION['profil']))
{
unset($_SESSION['login']);
unset($_SESSION['password']);
echo "<br>";	
?>
<div class="affichage">
<?php
echo $_SESSION['profil'];
?>
</div>
<?php
}
unset($_SESSION['profil']);

if((isset($_POST['connexion']))&&(isset($_POST['login']))&&(isset($_POST['password'])))
{

	$connexion= mysqli_connect("localhost", "root", "", "discussion"); 
	$login=$_POST['login'];
	$query="SELECT *from utilisateurs WHERE login='$login'";
	$result= mysqli_query($connexion, $query);
	$row = mysqli_fetch_array($result);
	
	if(password_verify($_POST['password'],$row['password'])) 
	{
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];
	
	if(isset($_SESSION['connexion']))
	{
	unset ($_SESSION['connexion']);
	header ('location: discussion.php');	
	}
	else
	{
	header ('location: ../index.php');
	}
	}
	else
	{	
	?>
	<div class="affichage">
	<?php
	echo "*Login ou Mot de Passe Incorrect(s)";	
	?>
	</div>
	<?php	
	}
	mysqli_close($connexion);	
}
		
?>

		<input type="text" required placeholder="Login" name="login">
		<input type="password" required placeholder="Password"  name="password">
		<input type="submit" value="Connexion" name="connexion">
		<input type="reset" value="Effacer" name="reset">
	</form>
</article>	

</body>
</html>