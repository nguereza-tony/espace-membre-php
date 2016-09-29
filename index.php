<?php
	//inclusion de fichier de configuration
	include('config.php');
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
						<h2>Mon espace membre</h2>
							<?php
							/*
								on verifie si l'utilisateur est connecté 
								si oui on affiche ses informations
								dans le cas contraire on lui demande de se connecter ou s'inscrire
								Pour verifier s'il est connecté	il suffit de tester
								les variables $_SESSION['id'] et $_SESSION['pseudo']
								existent
							*/
								if(!isset($_SESSION['id']) || !isset($_SESSION['pseudo'])){
									//l'utilisateur n'est pas connecté
									echo '<p>Vous n\'êtes pas encore connecté
											<a class = "btn btn-sm btn-primary" href = "connexion.php"><i class = "glyphicon glyphicon-off"></i> Connexion</a> ou
											<a class = "btn btn-sm btn-success" href = "inscription.php"><i class = "glyphicon glyphicon-user"></i> Créer votre compte</a>
											</p>';
								}
								else{
									// il est connecté on recupere ses infos
									$id = $_SESSION['id'];
									$sql = mysql_query("SELECT * FROM users WHERE id = '$id'") or die('Erreur de la requête SQL');
									//les donnees sous forme de tableau
									$donnees = mysql_fetch_array($sql);
								?>
								
						
								<p>Bienvenue dans votre compte <b><?php echo $donnees['pseudo'];?></b> voici vos informations</p>
								<p>Pseudo : <b><?php echo $donnees['pseudo'];?></b></p>
								<p>Nom : <b><?php echo $donnees['nom'];?></b></p>
								<p>Prénom : <b><?php echo $donnees['prenom'];?></b></p>
								<p>Sexe : <b><?php echo $donnees['sexe'];?></b></p>
								<p>
									 <a class = "btn btn-sm btn-primary" href = "membres.php"><i class = "glyphicon glyphicon-th-list"></i> Liste des membres</a>
									 <a class = "btn btn-sm btn-success" href = "modifier.php"><i class = "glyphicon glyphicon-edit"></i> Modifier votre profil</a>
									 <a class = "btn btn-sm btn-info" href = "deconnexion.php"><i class = "glyphicon glyphicon-off"></i> Déconnexion</a>
								 </p>
							<?php
								}
							?>
					</div>
				</div>
			</div>
			<!-- Bibliothèque JavaScript jquery -->
			<script src="bootstrap/js/jquery.min.js"></script>
			
			<!--  JavaScript de Bootstrap -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
		  </body>
		</html>