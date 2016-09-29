<?php
	//on démarre la session
	session_start();

    //information de connexion à la base de données
    $host = "localhost"; //adresse du serveur MySQL;
    $user = "root"; //nom d'utilisateur
	$password = ""; //mot de passe
	$database = "espace_membre"; //nom de la base de données
	
	//connexion au serveur MySQL
	$cnx = mysql_connect($host, $user, $password) or die('Erreur de connexion ');
	
	//selection de la base de données
	mysql_select_db($database, $cnx) or die('Erreur de selection de la base de données');
?>