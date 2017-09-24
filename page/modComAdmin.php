<?php 

session_start();
if (!isset($_SESSION['uti_pseudo'])) {
	header("Location: index.php?p=connectionAdmin");
}

?>

<h1 class="text-center text-uppercase page-header">modération des com</h1>