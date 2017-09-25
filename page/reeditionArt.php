<?php 
session_start(); 

$id = $_GET['R'];

include('./connect/connection.php');

$reponse = $bdd->query("SELECT art_titre, art_auteur, art_genre, art_content  FROM art_article WHERE 
	art_id='".$id."' ");


if (isset($_POST['valid'])) {

	include('./connect/connection.php');

	$titre = htmlspecialchars($_POST['titre']);
	$auteur = htmlspecialchars($_POST['auteur']);
	$genre = htmlspecialchars($_POST['genre']);
	$contenu = htmlspecialchars($_POST['contenu']);
	$modifTemp = htmlspecialchars("modifié le :");

	$sql = $bdd->exec("UPDATE art_article SET art_titre='".$titre."' , art_auteur='".$auteur."', art_genre='".$genre."', art_date=now(), art_content='".$contenu."' WHERE art_id='".$id."'");

	$bdd->exec($sql);

	$message = '<div class="row"><p class="text-success text-center">article modifié avec succès</p></div>';
	header('refresh:3;url=?p=listArtAdmin');
}


?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php while ($donnees = $reponse->fetch()) { ?>
			<h1 class="text-center text-uppercase page-header">Reedition de l'article <?= $donnees['art_titre']  ?></h1>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-xs-12 jumbotron">
			<form class="form-group" action='?p=reediter&&R=<?= $id ?>' method="post">
				<?= isset($message) ? $message : "" ?>
				<div class="col-xs-3">
					<label class="text-uppercase" for="titre">Titre <br>
						<input value="<?= $donnees['art_titre'] ?>" name="titre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1">
					<label class="text-uppercase" for="auteur">Auteur <br>
						<input value="<?= $donnees['art_auteur'] ?>" name="auteur" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1">
					<label class="text-uppercase" for="genre">Genre <br>
						<input value="<?= $donnees['art_genre'] ?>" name="genre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-12">
					<label class="text-uppercase" for="contenu">Contenu de l'article <br>
						<textarea class="form-control" name="contenu" id="" cols="200" rows="10"><?= $donnees['art_content'] ?></textarea>
					</label>

					<input class="btn btn-md btn-success pull-right" type="submit" name="valid">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
}
$reponse->closeCursor();
?>



<!-- quelqu'un aurait-il une idée de pourquoi dans un value j'arrive pas a afficher le contenu d'un article ? alors que le reste est bien pris encompte -->