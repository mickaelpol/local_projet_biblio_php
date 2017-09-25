<?php 

session_start();
if (!isset($_SESSION['uti_pseudo'])) {
	header("Location: index.php?p=connectionAdmin");
}

	// connection a la BDD
include('./connect/connection.php');

// préparation de la requete sql qui va afficher l'article avec son id, son heure, sa date, son titre et son genre
$reponse = $bdd->query('SELECT DATE_FORMAT(art_date, "%d/%m/%Y à %Hh%i") as date_format_art, art_id, art_titre, art_genre FROM art_article');


?>


<!-- début du contenu du tableau des articles coté admin -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 bg-inverse">
			<h1 class="text-uppercase text-center page-header">listes des articles</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-1">
			<p><a href="?p=ajoutArticle"><button title="Ajouter" class="btn btn-md btn-success" type="submit"><span class="glyphicon glyphicon-plus"></span></button></a><strong> Ajouter un article</strong></p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-3 col-sm-10 col-sm-offset-1">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th class="text-center text-uppercase">Date</th>
						<th class="text-center text-uppercase">Titre de l'article</th>
						<th class="text-center text-uppercase">Reediter</th>
						<th class="text-center text-uppercase">Supprimer</th>
					</tr>
				</thead>
				<tbody class="text-center list-inline">
					<!-- début de l'affichage en requete sql et php -->
					<?php 
					while ($donnees = $reponse->fetch()){ ?>
					<tr>
						<!-- affichage de la date ou l'articlé a été posté -->
						<td><?= $donnees['date_format_art'] ?></td>
						<!-- affichage du titre de l'article -->
						<td><a href='?p=modCom&&M=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>
						<!-- bouton de reedition de l'article -->
						<td><a href="?p=reediter&&R=<?= $donnees['art_id'] ?>"><button title="reediter" class="btn btn-md btn-warning" type="submit"><span class="glyphicon glyphicon-cog"></span></button></a></td>
						<!-- bouton de suppression de l'article -->
						<td><a href="?p=supprimer&&S=<?= $donnees['art_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a></td>
						<?php 
					}
					$reponse->closeCursor();
					?>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
