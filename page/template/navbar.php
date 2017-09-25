<nav class="navbar navbar-inverse fixed">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="?p=accueil">Accueil Bibliotheque</a>
		</div>
		<ul class="nav navbar-nav">
			<?php 
			if (!isset($_SESSION['uti_pseudo'])) { ?>
				<li class="active"><a href="?p=listArt"><span class="glyphicon glyphicon-align-justify"></span> Liste des articles</a></li>
				<?php
			}
			?>

			<?php
			if (isset($_SESSION['uti_pseudo'])) { ?>
			<li class="active"><a href="?p=listArt"><span class="glyphicon glyphicon-align-justify"></span> Liste des articles</a></li>
			<?php
			}
			?>
			
			<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php 
			if (isset($_SESSION['uti_pseudo'])) { ?>
			<li><a href="?p=listArtAdmin">Reedition, Ajout, Suppresion d'article</a></li>
			<!-- <li><a href="?p=modComAdmin">Modération des com</a></li> -->
			<?php 
		}
		?>

		<?php 
		if (!isset($_SESSION['uti_pseudo'])) { ?>
		<li><a href="?p=connectionAdmin"><span class="glyphicon glyphicon-user"></span> Login</a></li> -->
		<?php 
	}
	?>
	<li><a href="?p=decoAdmin"><span class="glyphicon glyphicon-off"></"></span> <?= isset($_SESSION['uti_pseudo']) ? $_SESSION['uti_pseudo']: "" ?></a></li>
</ul>
</div>
</nav>