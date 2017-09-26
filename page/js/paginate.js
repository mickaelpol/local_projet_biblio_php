$(document).ready(function(){
	

	$('#entete').html("\
		<tr>\
		<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_date'>Date</a></th>\
		<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_titre'>Titre de l'article</a></th>\
		<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_auteur'>Auteur</a></th>\
		<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_genre'>Genre</a></th>\
		</tr>");

	new List('idlist', {
		valueNames: ['name'],
		page: 5,
		pagination: true
	});
});