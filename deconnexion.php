<?php
	//inclusion de fichier de configuration
	include('config.php');
	//on supprime les variables de session
	session_unset();
	
	//on supprime les données de session
	session_destroy();
	
	//on redirige l'utilisateur sur la page d'accueil
	header('location:index.php');
?>