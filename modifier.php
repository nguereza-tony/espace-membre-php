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
		else{
			//il est connecté on recupere ses infos
			$id = $_SESSION['id'];
			$sql = mysql_query("SELECT * FROM users WHERE id = '$id'") or die('Erreur de la requête SQL');
			//les donnees sous forme de tableau
			$donnees = mysql_fetch_array($sql);
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
					if(empty($pseudo) || empty($nom) || empty($prenom)){
						$erreur = '<p class = "alert alert-danger">Veuillez remplir tous les champs</p>';
					}
					
					//on verifie si le pseudo existe déja
					$sql = mysql_query("SELECT * FROM users WHERE pseudo = '$pseudo' AND id != '".$donnees['id']."'") or die('Erreur de la requête SQL');
					$total = mysql_num_rows($sql);
					if($total != 0){
						//ce membre existe déja
						$erreur = '<p class = "alert alert-danger">Ce pseudo existe déjà veuillez choisir un autre pseudo</p>';
					}
					
					
					if($erreur == null){
						//tout est OK on fait la mise à jours de l'utilisateur
						/* si le mot de passe est saisi on change dans le cas contraire
							on garde l'ancien mot de passe 
						*/							
						
						if(empty($password)){
							$password = $donnees['password'];
						}
						else{
							//on crypte le mot de passe 
							$password = md5($password);
						}
						$sql = mysql_query("UPDATE users SET pseudo = '$pseudo', nom = '$nom', prenom = '$prenom', sexe = '$sexe', password = '$password' WHERE id = '".$_SESSION['id']."'") or die('Erreur de la requête SQL');
						if($sql){
							//on le redirige sur la page d'accueil
							header('location:index.php');
						}
						else{
							$erreur = '<p class = "alert alert-danger">Une erreur est survenue lors de la mise à jours de votre compte</p>';
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
						<form action = "modifier.php" method = "post" class = "well">
							<h4 class = "head">Modification de votre compte</h4>
							<div class = "form-group">
								<label for = "pseudo">Pseudo : </label>
								<input type = "text" name = "pseudo" value = "<?php echo $donnees['pseudo'];?>" class = "form-control input-sm">
							</div>
							<div class = "form-group">
								<label for = "password">Nouveau mot de passe : (laisser à vide pour garder l'ancien)</label>
								<input type = "password" name = "password" value = "" class = "form-control  input-sm">
							</div>
							<div class = "form-group">
								<label for = "nom">Nom : </label>
								<input type = "text" name = "nom" value = "<?php echo $donnees['nom'];?>" class = "form-control input-sm">
							</div>
							<div class = "form-group">
								<label for = "prenom">Prénom : </label>
								<input type = "text" name = "prenom" value = "<?php echo $donnees['prenom'];?>" class = "form-control input-sm">
							</div>
							<div class = "form-group">
								<label for = "sexe">Sexe : &nbsp; </label>
								<input type = "radio" name = "sexe" value = "masculin" <?php echo ($donnees['sexe'] == 'masculin')?'checked':'';?> class = "radio-inline"> Masculin <input type = "radio" name = "sexe" value = "feminin"  <?php echo ($donnees['sexe'] == 'feminin')?'checked':'';?> class = "radio-inline"> Féminin
							</div>
							<div class = "form-group">
								<input type = "submit" name = "submit" value = "Valider" class = "btn btn-sm btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
		<?php	
			}
		?>		
		</div>
	<!-- Bibliothèque JavaScript jquery -->
    <script src="bootstrap/js/jquery.min.js"></script>
    
	<!--  JavaScript de Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>