<?php 

session_start();

$id = $_GET['R'];

include('./connect/connection.php');

$affichage = sprintf('SELECT art_titre, art_auteur, art_genre, art_content  FROM art_article WHERE 
	art_id="%d"', $id);

$reponse = $bdd->query($affichage);


if (isset($_POST['valid'])) {

	include('./connect/connection.php');

	$titre = htmlspecialchars($_POST["titre"], ENT_QUOTES);
	$auteur = htmlspecialchars($_POST["auteur"], ENT_QUOTES);
	$genre = htmlspecialchars($_POST["genre"], ENT_QUOTES);
	$contenu = htmlspecialchars($_POST["contenu"], ENT_QUOTES);

	$sql = sprintf('UPDATE art_article SET art_titre="%s", art_auteur="%s", art_genre="%s", art_date=now(), art_content="%s" WHERE art_id="%d"', $titre, $auteur, $genre, $contenu, $id);

	$nb_row = $bdd->exec($sql);

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
	<div class="col-xs-1 col-xs-offset-1">
		<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
	</div>
	<div class="row">
		<div class="col-xs-12 jumbotron">
			<form class="form-group" action='?p=reediter&R=<?= $id ?>' method="post">
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