<?php
	//inclusion de fichier de configuration
	include('config.php');
	
	if(!isset($_SESSION['id']) || !isset($_SESSION['pseudo'])){
		//l'utilisateur n'est pas connecté on le redirige sur la page de connexion
		header('location:connexion.php');
	}
	
	//on verifie si l'id de existe 
	if(!isset($_GET['id'])){
		//l'id de l'utilisateur n'existe pas on le redirige sur la page des membres
		header('location:membres.php');
	}
	else{
		$id = mysql_escape_string($_GET['id']);
		$sql = mysql_query("SELECT * FROM users WHERE id = '$id'") or die('Erreur de la requête SQL');
		//les donnees sous forme de tableau
		$donnees = mysql_fetch_array($sql);
		if(empty($donnees)){
			//Cet utilisateur n'existe pas on le redirige sur la page des membres
			header('location:membres.php');
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espace membre</title>

	<!-- CSS de Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <!-- Notre style CSS  -->
	<link href="bootstrap/css/style.css" rel="stylesheet">
	
  </head>
  <body>
	<div class = "container">
		<br />
		<div class "row">
			<div class = "col-lg-offset-3 col-lg-6 col-lg-offset-3 well">
				<h2>Espace membre de <?php echo $donnees['pseudo'];?></h2>
				<p>Bienvenue dans votre compte <b><?php echo $donnees['pseudo'];?></b> voici vos informations</p>
				<p>Pseudo : <b><?php echo $donnees['pseudo'];?></b></p>
				<p>Nom : <b><?php echo $donnees['nom'];?></b></p>
				<p>Prénom : <b><?php echo $donnees['prenom'];?></b></p>
				<p>Sexe : <b><?php echo $donnees['sexe'];?></b></p>
				<p>
					 <a class = "btn btn-sm btn-primary" href = "membres.php"><i class = "glyphicon glyphicon-th-list"></i> Liste des membres</a>
					 <a class = "btn btn-sm btn-default" href = "index.php"> &laquo;  <i class = "glyphicon glyphicon-user"></i> Votre compte</a>
				 </p>
			</div>
		</div>
	</div>
	<!-- Bibliothèque JavaScript jquery -->
	<script src="bootstrap/js/jquery.min.js"></script>
	
	<!--  JavaScript de Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>