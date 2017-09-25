<?php 

session_start();

// include de la connection a la bdd
include('./connect/connection.php');

$test = "";

if(!empty($_GET['tri'])){
	$test = " order by " .$_GET['tri'];
	// SELECT * FROM art_article ORDER BY art_date DESC;
}
$reponse = $bdd->query('SELECT DATE_FORMAT(art_date, "%d/%m/%Y à %Hh%i") as date_format_art, art_id, art_titre, art_auteur, art_genre FROM art_article'.$test);

?>

<!-- contenu de ma liste d'article sous forma de tableau -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 bg-inverse">
			<h1 class="text-uppercase text-center page-header">listes des articles</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-1 col-xs-offset-1">
			<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">

			<div id="liste">
				<table class="table table-bordered table-striped table-hover">

					<!-- titre de chacune des colonnes -->
					<thead>
						<tr>
							<th class="text-center text-uppercase"><a href="?p=listArt&tri=art_date">Date</a></th>
							<th class="text-center text-uppercase"><a href="?p=listArt&tri=art_titre">Titre de l'article</a></th>
							<th class="text-center text-uppercase"><a href="?p=listArt&tri=art_auteur">Auteur</a></th>
							<th class="text-center text-uppercase"><a href="?p=listArt&tri=art_genre">Genre</a></th>
						</tr>
					</thead>

					<!-- requete sql qui affiche la valeur de chacun des colonnes du tableau (date/titre/genre) -->
					<?php 
					while ($donnees = $reponse->fetch()) { ?>
					<tbody class="text-center list">
						<tr class="name">
							<td><?= $donnees['date_format_art']; ?></td>
							<td><a href='?p=article&A=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>
							<td><?= $donnees['art_auteur'] ?></td>
							<td><?= $donnees['art_genre'] ?></td>
						</tr>
						
					</tbody>
					<?php }
					$reponse->closeCursor();
					?>
				</table>
				<div class="text-center">
					<ul class="pagination"></ul>
				</div>
			</div>
		</div>
	</div>
</div>
