<?php 

session_start();

/////////////////////  CONNECTION A LA BDD /////////////////////////////////////////////////////////////////

include('./connect/connection.php');

// STOCKE LA VALEUR DE $_GET DANS LA VARIABLE $ARTICLE ET $ID CORRESPOND A L'ID DE L'ARTICLE SELECTIONNÉ ///
$article = $_GET['p'];	
$id = $_GET['A'];


/////////////////////  REQUETE POUR AFFICHER LES ARTICLES ///////////////////////////////////////////////////

$reponse = $bdd->query("SELECT art_titre, art_genre, DATE_FORMAT(art_date, '%d/%m/%Y à %Hh%i') as date_format_art, art_content, art_auteur FROM art_article WHERE 
	art_id='".$id."' ");

///////////////////// REQUETE SQL POUR AFFICHER LES COMMENTAIRE DE L'ARTICLE SELECTIONNÉ /////////////////////

$com = $bdd->query("SELECT com_pseudo, DATE_FORMAT(com_date, '%d/%m/%Y à %Hh%i') as date_format_com , com_content FROM com_commentaires WHERE  art_article_art_id= '$id'");



///////////////////   FONCTION QUI VERIFIE QUE LES INPUTS SOIT REMPLIS ! /////////////////////////////////////

function testInputRemplis($fichier){
	if (empty($_POST[$fichier])) {
		return "<span class='text-danger'>" ."Le champ " .$fichier. " est vide <br>" . "</span>";
	}
}

if (isset($_POST['validFormCom'])) {

	include('./connect/connection.php');

	$erreur = "";
	$message = "";

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$commentaire = htmlspecialchars($_POST['commentaire']);


	$sql = sprintf('INSERT  INTO com_commentaires(com_pseudo, com_date, com_content, art_article_art_id) 
		VALUES ("%s", now(), "%s", "%s");', $pseudo, $commentaire, $id);

	$bdd->query($sql);
	header('refresh:0');
}
?>

<!-- //////////////////////////////// CONTENU DE L'ARTICLE ENTIER ///////////////////////////////////////// -->


<div class="container">
	<div class="row">
		<div class="col-xs-4">
			<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
		</div>
	</div>
	<br>
	<div class="jumbotron">

		<?php 
		while ($donnees = $reponse->fetch()) { ?>

		<!--////////////////////////   TITRE DE L'ARTICLE ///////////////////////////////////////////////// -->

		<u><i><h1 class="text-capitalize page-header"><?= $donnees['art_titre'] ?></h1></i></u>

		<!--////////////////////////   CONTENU DE L'ARTICLE /////////////////////////////////////////////// -->

		<p class="text-justify">
			<strong><?= $donnees['art_content']; ?></strong>
		</p> <br>

		<!--////////////////////////   GENRE DE L'ARTICLE ///////////////////////////////////////////////// -->
		<br>
		<p>
			<strong><i><u>Genre de l'article : </u></i></strong><?= $donnees['art_genre']  ?>
		</p>

		<!--////////////////////////  - AUTEUR DE L'ARTICLE /////////////////////////////////////////////// -->
		<p>
			<strong><i><u>Auteur de l'article : </u></i></strong><?= $donnees['art_auteur'] ?>
		</p>

		<!--////////////////////////   DATE DE L'ARTICLE /////////////////////////////////////////////////// -->
		<p>
			<strong><i><u>Posté le : </u></i></strong><?= $donnees['date_format_art'] ?>
		</p>

		<!--////////////////////////   BOUTON DE TÉLÉCHARGEMENT DE L'ARTICLE /////////////////////////////// -->

		<p><input type="button" value="Télécharger" class="btn btn-lg btn-primary" onclick="window.location='http://super/fichier.zip';"></p>
		<?php }
		$reponse->closeCursor();
		?>

	</div>
</div>
<!-- //////////////////////////   ESPACE COMMENTAIRES  ////////////////////////////////////////////////////// -->

<div class="container">
	<div class="row">

		
		<div class="col-xs-12">
			<u><i><h1 class="text-center text-uppercase">Commentaires</h1></i></u>
			<div class="row">

				<!-- /////////////  POST D'UN COMMENTAIRE///////////////////////////////////////////////////// -->


				<div class="container jumbotron">
					<form id="form_com" action='?p=article&A=<?= $id ?>' method="post">
						
						<!--//////// INPUT PSEUDO ////////////////////////////////////////////////////////////-->
						<div class="row">
							<div class="col-xs-3">
								<div class="form-group" id="pseudo_com">
									<label for="pseudo"><u><i>Pseudo </i></u><?= isset($erreurPseudo) ? $erreurPseudo: "" ?></label>
									<strong id="span"></strong>
									<input name="pseudo" class="form-control" type="text" id="pseudo_form_com">
								</div>
							</div>
						</div>
						
						<!--//////// INPUT COMMENTAIRE /////////////////////////////////////////////////////////-->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group" id="commentaire_com">
									<label for="commentaire"><u><i>Ajout un commentaire </i></u><?= isset($erreurCom) ? $erreurCom: "" ?></label>

									<strong id="span2"></strong>
									<textarea name="commentaire" class="form-control" id="commentaire_form_com" cols="10" rows="5"></textarea>
								</div>
							</div>
						</div>

						<!--//////// INPUT ENVOI DU FORMULAIRE ///////////////////////////////////////////////-->
						<input name="validFormCom" class="pull-right btn btn-md btn-success" type="submit">
					</form>
					<p class="text-center"><?= isset($message) ? $message : "" ?></p>
				</div>

				<!--//////////////////////////////  AFFICHE LES COMMENTAIRES POSTÉ ////////////////////////////  -->

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
					</section>
				</div>
				<?php }
				$com->closeCursor();
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/commentaire.js"></script>