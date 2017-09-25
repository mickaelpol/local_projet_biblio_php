<?php 
session_start();

include('./connect/connection.php');

$id = $_GET['com'];

$reponse = $bdd->query("SELECT com_id FROM com_commentaires WHERE 
	com_id='".$id."' ");

$delete = $bdd->query("DELETE FROM com_commentaires WHERE com_id='".$id."' ");

$messagesup = '<p class="text-center text-uppercase">Le commentaire '.$id.' à bien été supprimer cliquez <a href="?p=listArtAdmin" >ici pour être re diriger directement</a></p>';

header('refresh:5;url=index.php?p=listArtAdmin');

	?>


	<div class="container jumbotron text-success">
		<div class="row">
			<div class="col-xs-12">
			<?= isset($messagesup) ? $messagesup : "" ?>
			</div>
		</div>
	</div>