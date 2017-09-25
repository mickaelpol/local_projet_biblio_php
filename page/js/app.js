$(document).ready(function(){

	var pseudo = $('#pseudo'),
	mdp = $('#mdp'),
	test = $("#test"),
	test2 = $('#test2'),
	envoi = $("#envoi"),
	pseudo_com = $('#pseudo_com'),
	commentaire_com = $('#commentaire_com'),
	commentaire_form_com = $('#commentaire_form_com'),
	pseudo_form_com = $("#pseudo_form_com"),
	span = $("#span"),
	span2 = $("#span2");

	var erreur1 = " 3 caractère minimum";

	var erreur2 = " 5 caractère minimum";




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

}})

	$("#form_com").submit(function(e){

		pseudo_com.removeClass("has-error");
		span.text("");
		commentaire_com.removeClass("has-error");
		span2.text("")

        //pseudo_com

        if (pseudo_form_com.val().length <3 || pseudo_form_com.val().length >25) {
        	pseudo_com.addClass("has-error");
        	span.text(erreur1);
        	e.preventDefault();
        }

        // commentaire_com

        if (commentaire_form_com.val().length < 5 || commentaire_form_com.val().length >255) {
        	commentaire_com.addClass("has-error");
        	span2.text(erreur2);
        	e.preventDefault();
        }
    })

		var monkeyList = new List('liste', {
		  valueNames: ['name'],
		  page: 2,
		  pagination: true
		});



});


