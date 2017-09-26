<?php 
session_start();


include('./connect/connection.php');

$id = $_GET['M'];

$reponse = $bdd->query("SELECT art_id  FROM art_article WHERE 
	art_id='".$id."'");

$com = $bdd->query("SELECT com_pseudo, DATE_FORMAT(com_date, '%d/%m/%Y à %Hh%i') as date_format_com , com_content, com_id FROM com_commentaires WHERE  art_article_art_id= '$id'");


?>
<div class="row">
	<div class="col-xs-4 col-xs-offset-1">
		<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
	</div>
</div>

<?php while ($donnees = $reponse->fetch()) { ?>
<h1 class="text-center text-uppercase page-header">Modération des commentaires de l'article <?= $id  ?></h1>
<?php 
}
$reponse->closeCursor();
?>
<?= isset($messagesup) ? $messagesup: "" ?>

<?php while($donnees = $com->fetch()) { ?>
<div class="col-xs-12">

	<!--///////////////////// ESPACE PSEUDO /////////////////////////////////////////////////-->
	<section class=" jumbotron">
		<div class="col-xs-3">
			<strong><p><u><i><?= $donnees['com_pseudo'] ?> à écrit</i></u></p></strong>
		</div>

		<!--/////////////////// ESPACE DATE HEURE DU POST ///////////////////////////-->
		<div class="col-xs-4">
			<p><u><i>le <?= $donnees['date_format_com'] ?></i></u></p>
		</div>

		<!--////////////////////// ESPACE COMMENTAIRE ////////////////////////////////////:-->
		<div class="col-xs-12 text-justify page-header">
			<p>
				<?= $donnees['com_content'] ?>
			</p>
		</div>
		<a href="?p=suppression&com=<?= $donnees['com_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span> <strong>Supprimer</strong></button></a>
		<?php }
		$com->closeCursor();
		?>
		
	</section>
</div>
