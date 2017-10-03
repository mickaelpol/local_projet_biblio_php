<?php 
session_start();

if (!isset($_SESSION['uti_pseudo'])) {
	header("Location: index.php?p=connectionAdmin");
}

	///////////////////////////////// CONNECTION A LA BDD ////////////////////////////////////////////
include('./connect/connection.php');

//// PRÉPARATION DE LA REQUETE SQL QUI VA AFFICHER L'ARTICLE AVEC SON ID, SON HEURE, SA DATE, SON TITRE ET SON GENRE//
$reponse = $bdd->query('SELECT DATE_FORMAT(art_date, "%d/%m/%Y à %Hh%i") as date_format_art, art_id, art_titre, art_genre FROM art_article');


?>


<!--/////////////////////// DÉBUT DU CONTENU DU TABLEAU DES ARTICLES COTÉ ADMIN /////////////////////////////-->
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
			<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-4 col-xs-offset-1">
			<p><a href="?p=ajoutArticle"><button title="Ajouter" class="btn btn-md btn-success" type="submit"><span class="glyphicon glyphicon-plus"></span></button></a><strong> Ajouter un article</strong></p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-3 col-sm-10 col-sm-offset-1">
			<div id="idlistAdmin">
			<div class="text-center">
					<ul class="pagination"></ul>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<thead id="enteteAdmin">
						<tr>
							<th class="text-center text-uppercase">Date</th>
							<th class="text-center text-uppercase">Moderer un commentaire de l'article</th>
							<th class="text-center text-uppercase">Reediter</th>
							<th class="text-center text-uppercase">Supprimer</th>
						</tr>
					</thead>
					<tbody id="tableauAdmin" class="text-center list-inline list">
						<!--////////////// DÉBUT DE L'AFFICHAGE EN REQUETE SQL ET PHP /////////////////////////////////-->
						<?php 
						while ($donnees = $reponse->fetch()){ ?>
						<tr class="nameAdmin">
							<!--/////////// AFFICHAGE DE LA DATE OU L'ARTICLÉ A ÉTÉ POSTÉ /////////////////////////////-->
							<td><?= $donnees['date_format_art'] ?></td>

							<!--/////////// AFFICHAGE DU TITRE DE L'ARTICLE ///////////////////////////////////////////-->
							<td><a href='?p=modCom&M=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>

							<!--//////////// BOUTON DE REEDITION DE L'ARTICLE //////////////////////////////////////////-->
							<td><a href="?p=reediter&R=<?= $donnees['art_id'] ?>"><button title="reediter" class="btn btn-md btn-warning" type="submit"><span class="glyphicon glyphicon-cog"></span></button></a></td>

							<!--//////////// BOUTON DE SUPPRESSION DE L'ARTICLE ////////////////////////////////////////-->
							<td><a href="?p=supprimer&S=<?= $donnees['art_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a></td>
						</tr>
						<?php }
						$reponse->closeCursor();
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/list.js/dist/list.js" ></script>
<script type="text/javascript" src="page/js/paginate.js"></script>
