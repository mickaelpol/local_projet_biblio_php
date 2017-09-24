<?php 

include('./connect/connection.php');



if (isset($_POST)) {
	if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$password = $_POST['password'];

			//verif du mot de passe 
		try {

			$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'admin');

		} catch (Exception $e) {
				// en cas d'erreur je l'affiche et je stoppe tout 
			die('Erreur :' .$e->getMessage());
		}

			// Recherche utilisateur
		$sql = sprintf("SELECT * FROM uti_utilisateur WHERE uti_pseudo = '%s';", $pseudo);
		$reponse = $bdd->query($sql);
		$row = $reponse->fetch();
		if ($password === $row['uti_password']) {
			session_start();
			$_SESSION['uti_pseudo'] = $pseudo;
			$_SESSION['uti_id'] = $row['uti_id'];
			header('refresh:5;url=index.php?p=listArtAdmin');
			$message = "<div class='container-fluid text-center'" . "<p><span class='text-success text-uppercase'> Connection </span></p>" . "<br>" . "<div class='loader center-block margin-bot'></div>" . "</div>";
		} else {
			$message = "<strong class='text-danger'>Identifient incorrect</strong>";
		}
	}
}

?>


<div class="container">
	<div class="row">
		<div class="col-xs-5 col-xs-offset-3 jumbotron">
			<form action="?p=connectionAdmin" method="POST" id='form'>
				<div class="form-group text-center" id="test">
					<label class="control-label" for="pseudo">Pseudonyme <?= isset($erreurPseudo) ? $erreurPseudo: "" ?></label>
					<input name="pseudo" type="text" class="champ form-control" id="pseudo">
				</div>
				<div class="form-group text-center" id="test2">
					<label class="control-label" for="mdp">mot de passe <?= isset($erreurMdp) ? $erreurMdp: "" ?></label>
					<input name="password" type="password" class="champ2 form-control" id="mdp">
				</div>
				<input name="valid" class="btn btn-info pull-right" type="submit" id="envoi" value="Envoyer" />
			</form>
			<p><?= isset($message) ? $message: "" ?></p>
		</div>
	</div>
</div>