<?php
	//inclusion de fichier de configuration
	include('config.php');
	/*
		on verifie si l'utilisateur est connecté 
	*/
	if(!isset($_SESSION['id']) || !isset($_SESSION['pseudo'])){
		//l'utilisateur n'est pas connecté on le redirige sur la page de connexion
		header('location:connexion.php');
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
			<h3>Liste des membres du site</h3>
			<table class="table table-striped table-condensed table-responsive table-bordered">
			<thead>
				<tr class = "text-center">
					<td>ID</td>
					<td>Pseudo</td>
					<td>Nom</td>
					<td>Prénom</td>
					<td>Sexe</td>
					<td>Actions</td>
				</tr>
			</thead>
			<?php
				$sql = mysql_query("SELECT * FROM users ORDER BY nom,prenom") or die('Erreur de la requête SQL');
				while($donnees = mysql_fetch_array($sql)){
					?>
						<tr class = "text-center">
							<td><?php echo $donnees['id'];?></td>
							<td><?php echo $donnees['pseudo'];?></td>
							<td><?php echo $donnees['nom'];?></td>
							<td><?php echo $donnees['prenom'];?></td>
							<td><?php echo $donnees['sexe'];?></td>
							<td><a class = "btn btn-sm btn-primary" href = "profil.php?id=<?php echo $donnees['id'];?>"><i class = "glyphicon glyphicon-eye-open"></i> Voir son profil</a></td>
						</tr>
					<?php
				}
			?>
			</table>
			<p class = "text-right"><a class = "btn btn-sm btn-default" href = "index.php"> &laquo;  <i class = "glyphicon glyphicon-user"></i> Votre compte</a>
		</div>
	<!-- Bibliothèque JavaScript jquery -->
	<script src="bootstrap/js/jquery.min.js"></script>
	
	<!--  JavaScript de Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>