<?php 

// injection du fichier connection.php qui lis les variable au valeurs utilé pour la connection a la BDD
include('./config/parameters.php');

// connection a la BDD 
try {

	$bdd = new PDO('mysql:host='.$serverdb.';dbname=' .$dbname. ';charset=utf8', $userdb, $passworddb);

} catch (Exception $e) {

// si il y a une erreur j'envoi un message et je stoppe tout processus
	die('Erreur :' .$e->getMessage());

}

?>