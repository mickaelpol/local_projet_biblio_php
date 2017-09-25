<?php 
session_start();

include('./connect/connection.php');

$id = $_GET['S'];

$reponse = $bdd->query("SELECT art_id FROM art_article WHERE 
	art_id='".$id."' ");

$delete = $bdd->query("DELETE FROM art_article WHERE art_id='".$id."' ");

$messagesup = '<p class="text-center text-uppercase">L\'article '.$id.' à bien été supprimer cliquez <a href="?p=listArtAdmin" >ici pour être re diriger directement</a></p>';

header('refresh:5;url=index.php?p=listArtAdmin');

	?>


	<div class="container jumbotron text-success">
		<div class="row">
			<div class="col-xs-12">
			<?= isset($messagesup) ? $messagesup : "" ?>
			</div>
		</div>
	</div>