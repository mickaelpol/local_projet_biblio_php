$(document).ready(function(){
    
        titre = $('#titre'),
        auteur = $('#auteur'),
        genre = $('#genre'),
        contenu = $('#contenu'),
        error1 = $('#error1'),
        error2 = $('#error2'),
        error3 = $('#error3'),
        error4 = $('#error4'),
    
    
        $('#ajourArt').submit(function(e){
            error1.removeClass("has-error");
            error2.removeClass("has-error");
            error3.removeClass("has-error");
            error4.removeClass("has-error");
    
            /////////////////////VERIFICATION QUE LE TITRE SOIT BIEN REMPLIS//////////////////////////////////////////
    
            if (titre.val().length < 5 ||  titre.val().length > 255) {
                error1.addClass("has-error");
                $('#textTitre').html("<small><strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> minimum de 5 à 255 caractères</strong></small>");
                e.preventDefault();
            } 
            else { 
                error1.removeClass("has-error").addClass("has-success");; 
                $('#textTitre').html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
            }
    
            // ///////////////////VERIFICATION QUE L'AUTEUR SOIT BIEN REMPLIS/////////////////////////////////////////
    
            if (auteur.val().length < 5 ||  auteur.val().length > 255) {
                error2.addClass("has-error");
                $('#textAuteur').html("<small><strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> minimum de 5 à 255 caractères</strong></small>");
                e.preventDefault();
            }
            else { 
                error2.removeClass("has-error").addClass("has-success");
                $('#textAuteur').html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
            }
    
            // /////////////////VERIFICATION QUE LE L'AUTEUR SOIT BIEN REMPLS////////////////////////////////////////////
    
    
            if (genre.val().length < 5 ||  genre.val().length > 255) {
                error3.addClass("has-error");
                $('#textGenre').html("<small><strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> minimum de 5 à 255 caractères</strong></small>");
                e.preventDefault();
            }
            else { 
                error3.removeClass("has-error").addClass("has-success"); 
                $('#textGenre').html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
            }
    
            // ////////////////VERIFICATION QUE LE CONTENU SOIT BIEN REMPLIS/////////////////////////////////////////////
    
    
            if (contenu.val().length < 5 ||  contenu.val().length > 800) {
                error4.addClass("has-error");
                $('#textContenu').html("<small><strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> minimum de 5 à 800 caractères</strong></small>");
                e.preventDefault();
            }
            else { 
                error4.removeClass("has-error").addClass("has-success"); 
                $('#textContenu').html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
            }
    
    
    
        });
    
    
    });