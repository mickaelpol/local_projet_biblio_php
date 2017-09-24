<?php 

include('./connect/connection.php');

// stocke la valeur de $_GET dans la variable $article et $id correspond a l'id de l'article selectionné
$article = $_GET['p'];	
$id = $_GET['A'];


// requete sql pour afficher l'article selectionné
$reponse = $bdd->query("SELECT art_titre, art_genre, DATE_FORMAT(art_date, '%d/%m/%Y à %Hh%i') as date_format_art, art_content, art_auteur FROM art_article WHERE 
	art_id='".$id."' ");

// requete sql pour afficher les commentaire de l'article selectionné
$com = $bdd->query("SELECT com_pseudo, DATE_FORMAT(com_date, '%d/%m/%Y à %Hh%i') as date_format_com , com_content FROM com_commentaires WHERE  art_article_art_id= '$id'");

//fonction qui permet de gerer si les inputs de pseudo et commentaire sont bien remplis
// function testInputRemplis($fichier){
// 	if (empty($_POST['$fichier'])) {
// 		return "<span class='text-danger'> Pour poster, le champ " .$fichier. " doit être remplis ! <br></span>";
// 	}
// }


//fonction qui verifie que les inputs soit remplis !
function testInputRemplis($fichier){
	if (empty($_POST[$fichier])) {
		return "<span class='text-danger'>" ."Le champ " .$fichier. " est vide <br>" . "</span>";
	}
}

if (isset($_POST['validFormCom'])) {
	
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$commentaire = htmlspecialchars($_POST['commentaire']);

	var_dump($pseudo . " " . $commentaire. " " . $id );

	try {
	     $bdd = new 
	     //connection a la BDD
	     PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "admin");
	   } 
	   catch (Exception $e) {
	     //si erreur lance l'affichage de l'erreur et stoppe la suite
	     die('Erreur: ' .$e->getMessage());
	   }

	$sql = sprintf('INSERT INTO com_commentaires(com_pseudo, com_date, com_content, art_article_art_id)
		VALUES ("'.$pseudo.'", "'.$commentaire.'", "'.$id.'" )');

	$bdd->exec($sql);
}

  // $erreurPseudo = ": " . testInputRemplis('pseudo');
  // $erreurCom = ": " . testInputRemplis('commentaire');

  // // condition de validations du formulaire 
  // if ( empty($erreur)) {

  //   try {
  //     $bdd = new 
  //     //connection a la BDD
  //     PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "admin");
  //   } 
  //   catch (Exception $e) {
  //     //si erreur lance l'affichage de l'erreur et stoppe la suite
  //     die('Erreur: ' .$e->getMessage());
  //   }

  //   //préparation des valeurs a insérer (inputs) + cryptage du password
  //   $pseudo = htmlspecialchars($_POST['pseudo']);
  //   $commentaire = htmlspecialchars($_POST['commentaire']);



  //   // preparation de la requete 
  //   $sql = sprintf('INSERT  INTO com_commentaires(com_pseudo, com_content, art_article_art_id)
  //    VALUES ("'.$pseudo.'",  "'.$commentaire.'", "'.$_GET['A'].'" ');

  //   // 'SELECT Reponse FROM FAC WHERE Question="'.$questionfac.'"'

  //   //execution et verification 
  //   if ($bdd->exec($sql)) {

  //     $message = "<div class='container-fluid text-center'" . "<p><span class='text-success text-uppercase'> commentaire non posté </span></p>" . "<br>" . "<div class='loader center-block margin-bot'></div>" . "</div>";

  //     // header("refresh:5;url=index.php?p=connexion");
  //   } 
  //   else {
  //     $message = "<div class='container-fluid text-center'" . "<p><span class='text-success text-uppercase'> commentaire posté </span></p>"."</div>";
  //   }
  // }


?>

<!-- //////////////////////////////// CONTENU DE L'ARTICLE ENTIER ///////////////////////////////////////// -->


<div class="container">
	<div class="jumbotron">

		<?php 
		while ($donnees = $reponse->fetch()) { ?>

		<!-- titre de l'article -->
		<u><i><h1 class="text-capitalize page-header"><?= $donnees['art_titre'] ?></h1></i></u>

		<!-- contenu de l'article -->
		<p class="text-justify">
			<strong><?= $donnees['art_content']; ?></strong>
		</p> <br>

		<!-- genre de l'article -->
		<br>
		<p>
			<strong><i><u>Genre de l'article : </u></i></strong><?= $donnees['art_genre']  ?>
		</p>

		<!-- auteur de l'article -->
		<p>
			<strong><i><u>Auteur de l'article : </u></i></strong><?= $donnees['art_auteur'] ?>
		</p>

		<!-- Date de l'article -->
		<p>
			<strong><i><u>Posté le : </u></i></strong><?= $donnees['date_format_art'] ?>
		</p>

		<!-- Bouton de téléchargement de l'article -->
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Download</a></p>
		<?php }
		$reponse->closeCursor();
		?>

	</div>
</div>
<!-- //////////////////////////      ESPACE COMMENTAIRES  ////////////////////////////////////////////////////// -->

<div class="container">
	<div class="row">

		
		<div class="col-xs-12">
			<u><i><h1 class="text-center text-uppercase">Commentaires</h1></i></u>
			<div class="row">

				<!-- ///////////////////////////      POST D'UN COMMENTAIRE  ////////////////////////////////////////////////// -->


				<div class="container jumbotron">
					<form action='<?php $pageActuelle ?>' method="post">
						
						<!-- input pseudo -->
						<div class="row">
							<div class="col-xs-3">
								<div class="form-group">
									<label for="pseudo"><u><i>Pseudo </i></u><?= isset($erreurPseudo) ? $erreurPseudo: "" ?></label>
									<input name="pseudo" class="form-control" type="text" id="pseudo">
								</div>
							</div>
						</div>
						
						<!-- input commentaire -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="commentaire"><u><i>Ajout un commentaire </i></u><?= isset($erreurCom) ? $erreurCom: "" ?></label>
									<textarea name="commentaire" class="form-control" id="commentaire" cols="10" rows="5"></textarea>
								</div>
							</div>
						</div>

						<!-- input envoi du formulaire -->
						<input name="validFormCom" class="pull-right btn btn-md btn-success" type="submit">
					</form>
					<p class="text-center"><?= isset($message) ? $message : "" ?></p>
				</div>

				<!--//////////////////////////////  AFFICHE LES COMMENTAIRES POSTÉ ///////////////////////////////////////////  -->

				<?php while($donnees = $com->fetch()) { ?>
				<div class="col-xs-12">
					<!-- espace pseudo -->
					<section class=" jumbotron">
						<div class="col-xs-3">
							<strong><p><u><i><?= $donnees['com_pseudo'] ?> à écrit</i></u></p></strong>
						</div>

						<!-- espace date heure du post -->
						<div class="col-xs-4">
							<p><u><i>le <?= $donnees['date_format_com'] ?></i></u></p>
						</div>

						<!-- espace commentaire -->
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