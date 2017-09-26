$(document).ready(function(){

	pseudo = $('#pseudo'),
	mdp = $('#mdp'),
	test = $("#test"),
	test2 = $('#test2'),
	envoi = $("#envoi"),


	$("#form").submit(function(e){

		test.removeClass("has-error");
		test2.removeClass("has-error");

 // PSEUDO
 
// validation ou erreur de saisie a modifier en fonction du PHP

if (pseudo.val().length <5 || pseudo.val().length >25) {
	test.addClass("has-error");
	e.preventDefault();

}

//  MOT DE PASSE

// validation ou erreur de saisie a modifier en fonction du PHP

if (mdp.val().length <5 || mdp.val().length >25) {
	test2.addClass("has-error");
	e.preventDefault();

}
});

	
});


