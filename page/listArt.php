<?php 

// include de la connection a la bdd
include('./connect/connection.php');

//  preparation de la requete qui va afficher la liste des articles et transformation du format de la date en heure et date française 
$reponse = $bdd->query('SELECT DATE_FORMAT(art_date, "%d/%m/%Y à %Hh%i") as date_format_art, art_id, art_titre, art_genre FROM art_article');


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
		<div class="col-xs-10 col-xs-offset-1">
			<table class="table table-bordered table-striped table-hover">
				
				<!-- titre de chacune des colonnes -->
				<thead>
					<tr>
						<th class="text-center text-uppercase">Date</th>
						<th class="text-center text-uppercase">Titre de l'article</th>
						<th class="text-center text-uppercase">Genre</th>
					</tr>
				</thead>
				
				<!-- requete sql qui affiche la valeur de chacun des colonnes du tableau (date/titre/genre) -->
				<tbody class="text-center list-inline">
					<?php 
					while ($donnees = $reponse->fetch()) { ?>
					<tr>
						<td><?= $donnees['date_format_art']; ?></td>
						<!-- création d'une superglobale en A pour recuperer chaque article différent sur la requete sql la variablesuperglobale du lien vaut ARTICLE&&A= ID -->
						<td><a href='?p=article&&A=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>
						<td><?= $donnees['art_genre'] ?></td>
					</tr>
					<?php }
					$reponse->closeCursor();
					?>
				</tbody>

			</table>
		</div>
	</div>
</div>