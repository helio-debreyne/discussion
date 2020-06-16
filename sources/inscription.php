<html>

<head>
<link href="discussion.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<title>Inscription</title>
</head>

	<body class="inscription">
		<header>	
			<ul class="ul2">
				<li><a href="../index.php">Accueil</a></li>
				<li><a href="connexion.php">Connexion</a></li>
			</ul>
		</header>

<?php


?>


<article class="form">
	<div class="form-style-8">
		<h2>Inscription</h2>
			<form method="post" action="inscription.php">


<?php

if(!empty($_POST['inscription']))
{
	$connexion= mysqli_connect("localhost", "root", "", "discussion"); 
	$login=$_POST['login'];
	$checkdups="SELECT  *from utilisateurs WHERE login='$login'";
    $checkdups2=mysqli_query($connexion, $checkdups) or die(mysqli_error($connexion));
    $checkdups3=mysqli_num_rows($checkdups2);
		
	if((($_POST['password']!=$_POST['confirmpassword'])||($checkdups3>0))||(strlen($_POST['password'])< 5))
	{
		if(($_POST['password']!=$_POST['confirmpassword'])&&($checkdups3>0))
		{
			?>
			<div class="affichage">
			<?php
			echo"*Mots de passes rentrés différents";
			?>
			</div>
			<div class="affichage">
			<?php
			echo"*Veuillez renseigner un autre login";
			mysqli_close($connexion);
			?>
			</div>
			<?php
		}
		else if((strlen($_POST['password'])< 5)&&($checkdups3>0))
		{  
			?>
			<div class="affichage">
			<?php
			echo"*Veuillez renseigner un autre login";
			?>
			</div>
			<div class="affichage">
			<?php
			echo"*Mots de passes trop courts";
			echo" 5 caractères minimum";
			mysqli_close($connexion);
			?>
			</div>
			<?php			
		}	
		else if($checkdups3>0)
		{	  
			?>
			<div class="affichage">
			<?php
			echo "*Veuillez renseigner un autre login";
			?>
			</div>
			<?php
			mysqli_close($connexion);	
		}
		else if($_POST['password']!=$_POST['confirmpassword'])
		{  
			?>
			<div class="affichage">
			<?php
			echo"*Mots de passes rentrés différents";
			mysqli_close($connexion);
			?>
			</div>
			<?php			
		}
		else if(strlen($_POST['password']< 5))
		{  
			?>
			<div class="affichage">
			<?php
			echo"*Mots de passes trop courts";
			echo " 5 caractères minimum";
			mysqli_close($connexion);
			?>
			</div>
			<?php			
		}	
	}	
	else
	{	
			$hash = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);					
			$connexion= mysqli_connect("localhost", "root", "", "discussion"); 
			$query = 'INSERT INTO `utilisateurs`(`login`,`password`)VALUES
			("'.$_POST['login'].'", "'.$hash.'");';		
			mysqli_query($connexion, $query);		 
			mysqli_close($connexion);
			header('Location: connexion.php');	
			
			
	}
}
	
?>

    <input type="text" required name="login" placeholder="Login" />
    <input type="text" required name="password" placeholder="Password" />
    <input type="password" required name="confirmpassword" placeholder="Confirm Password" />
    <input type="submit" name="inscription" value="S'inscrire" />
	 <input type="reset" name="Effacer" value="Effacer" />
  </form>
</div>

</article>

	</body>
</html>