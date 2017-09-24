<?php 
session_start();


if (isset($_POST['valid'])) {

	include('./connect/connection.php');

	$titre = htmlspecialchars($_POST['titre']);
	$auteur = htmlspecialchars($_POST['auteur']);
	$genre = htmlspecialchars($_POST['genre']);
	$contenu = htmlspecialchars($_POST['contenu']);

	$sql = sprintf('INSERT  INTO art_article(art_titre, art_auteur, art_genre, art_date, art_content) 
		VALUES ("%s", "%s", "%s", now(), "%s");', $titre, $auteur, $genre, $contenu);

	$bdd->query($sql);
	$message = '<div class="row"><p class="text-success text-center">article ajouté avec succès</p></div>';
	header('refresh:5');
}

	

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1 class="text-center text-uppercase page-header">Ajouter un article</h1>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-xs-12 jumbotron">
		<form class="form-group" method="post" action="?p=ajoutArticle">
				<?= isset($message) ? $message : "" ?>
				<div class="col-xs-3">
					<label class="text-uppercase" for="titre">Titre <br>
						<input name="titre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1">
					<label class="text-uppercase" for="titre">Auteur <br>
						<input name="auteur" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1">
					<label class="text-uppercase" for="titre">Genre <br>
						<input name="genre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-12">
					<label class="text-uppercase" for="titre">Contenu de l'article <br>
						<textarea class="form-control" name="contenu" id="" cols="200" rows="10"></textarea>
					</label>

					<input class="btn btn-md btn-success pull-right" type="submit" name="valid">
				</div>


			</form>
		</div>
	</div>
	
</div>