<?php 

session_start();

// include de la connection a la bdd
include('./connect/connection.php');

$tri = "";
if(!empty($_GET['tri'])){

	$tri = " order by " .$_GET['tri'];
}


$sql = 'SELECT DATE_FORMAT(art_date, "%d/%m/%Y à %Hh%i") as date_format_art, art_id, art_titre, art_auteur, art_genre 
	FROM art_article'.$tri;

$reponse = $bdd->query($sql);

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

			<div id="idlist">
				<table class="table table-bordered table-striped table-hover">

					<!-- titre de chacune des colonnes -->
					<thead id="entete">
						<tr>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_date'>Date</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_titre'>Titre de l'article</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_auteur'>Auteur</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_genre'>Genre</a></th>
						</tr>
					</thead>

					<!-- requete sql qui affiche la valeur de chacun des colonnes du tableau (date/titre/genre) -->
					
					<tbody id="tableau" class="text-center list">

						<?php  
						while ($donnees = $reponse->fetch()){
							?>
							<tr class="name">
								<td><?= $donnees['date_format_art'] ?></td>
								<td><a href='?p=article&A=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>
								<td><?= $donnees['art_auteur'] ?></td>
								<td><?= $donnees['art_genre'] ?></td>
							</tr>
							<?php }
							$reponse->closeCursor();
							?>

						</tbody>

					</table>
					<div class="text-center">
						<ul class="pagination"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="node_modules/list.js/dist/list.js" ></script>
	<script type="text/javascript" src="page/js/paginate.js"></script>


	<!-- <a href='?p=article&A=<?= $donnees['art_id'] ?>'> -->
