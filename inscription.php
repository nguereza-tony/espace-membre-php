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
		 <?php
			//on verifie si le formulaire a été envoyé
			if(isset($_POST['submit'])){
				//la variable erreur vaut null par défaut
				$erreur = null;
				//on convertit chaque champ en variable avec la fonction extract()
				extract($_POST);
				
				//on verifie les champs vides
				if(empty($pseudo) || empty($password) || empty($confirm_password) || empty($nom) || empty($prenom)){
					$erreur = '<p class = "alert alert-danger">Veuillez remplir tous les champs</p>';
				}
				//si le mot de passe est égal à la confirmation
				else if($password != $confirm_password){
					$erreur = '<p class = "alert alert-danger">Les deux mots de passe sont différents</p>';
				}
				//on verifie si le pseudo existe déja
				$sql = mysql_query("SELECT id FROM users WHERE pseudo = '$pseudo'") or die('Erreur de la requête SQL');
				$total = mysql_num_rows($sql);
				if($total != 0){
					//ce membre existe déja
					$erreur = '<p class = "alert alert-danger">Ce pseudo existe déjà veuillez choisir un autre pseudo</p>';
				}
				
				
				if($erreur == null){
					//tout est OK on enregistre l'utilisateur
					//on crypte le mot de passe 
					$password = md5($password);
					$sql = mysql_query("INSERT INTO users(pseudo, nom, prenom, sexe, password) VALUES('$pseudo', '$nom', '$prenom', '$sexe', '$password')") or die('Erreur de la requête SQL');
					if($sql){
						echo '<p class = "alert alert-success">Votre compte a été créé avec succès <a class = "btn btn-sm btn-primary" href = "connexion.php"><i class = "glyphicon glyphicon-off"></i> Connexion</a></p>';
					}
					else{
						$erreur = '<p class = "alert alert-danger">Une erreur est survenue lors de la création de votre compte</p>';
					}
				}
				
			}
			
			//on affiche le formulaire
			//s'il ya des erreurs alors on les affiche
			if(isset($erreur)){
				echo $erreur;
			}
			?>
			<div class "row">
				<div class = "col-lg-offset-4 col-lg-4 col-lg-offset-4">
					<form action = "inscription.php" method = "post" class = "well">
						<h4 class = "head">Créer votre compte gratuitement</h4>
						<div class = "form-group">
							<label for = "pseudo">Pseudo : </label>
							<input type = "text" name = "pseudo" value = "" class = "form-control input-sm">
						</div>
						<div class = "form-group">
							<label for = "password">Mot de passe : </label>
							<input type = "password" name = "password" value = "" class = "form-control  input-sm">
						</div>
						<div class = "form-group">
							<label for = "confirm_password">Confirmation de mot de passe : </label>
							<input type = "password" name = "confirm_password" value = "" class = "form-control  input-sm">
						</div>
						<div class = "form-group">
							<label for = "nom">Nom : </label>
							<input type = "text" name = "nom" value = "" class = "form-control input-sm">
						</div>
						<div class = "form-group">
							<label for = "prenom">Prénom : </label>
							<input type = "text" name = "prenom" value = "" class = "form-control input-sm">
						</div>
						<div class = "form-group">
							<label for = "sexe">Sexe : &nbsp; </label>
							<input type = "radio" name = "sexe" value = "masculin" checked class = "radio-inline"> Masculin <input type = "radio" name = "sexe" value = "feminin"  class = "radio-inline"> Féminin
						</div>
						<div class = "form-group">
							<input type = "submit" name = "submit" value = "Valider" class = "btn btn-sm btn-primary btn-block">
						</div>
					</form>
				</div>
			</div>
				
	</div>
	<!-- Bibliothèque JavaScript jquery -->
    <script src="bootstrap/js/jquery.min.js"></script>
    
	<!--  JavaScript de Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>