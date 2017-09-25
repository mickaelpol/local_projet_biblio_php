<?php 

session_start();

include('./connect/connection.php');

$id = $_GET['M'];
$com = 

$reponse = $bdd->query("SELECT art_id  FROM art_article WHERE 
	art_id='".$id."' ");

$com = $bdd->query("SELECT com_pseudo, DATE_FORMAT(com_date, '%d/%m/%Y à %Hh%i') as date_format_com , com_content FROM com_commentaires WHERE  art_article_art_id= '$id'");

$delete = $bdd->query("DELETE FROM com_commentaires WHERE com_id='".$com."' ");

$messagesup = '<h1 class="text-center text-uppercase">Le commentaire '.$com.' à bien été supprimer</h1>';

header('refresh:5;url=index.php?p=listArtAdmin');


?>


<?php while ($donnees = $reponse->fetch()) { ?>
<h1 class="text-center text-uppercase page-header">Modération des commentaires de l'article <?= $id  ?></h1>
<?php 
}
$reponse->closeCursor();
?>

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

		<a href="?p=supprimer&&M=<?= $donnees['com_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a>
	</section>
</div>
<?php }
$com->closeCursor();
?>