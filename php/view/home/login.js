$(function(){
    $('#loginForm').on('submit', function(e) {

        e.preventDefault();     
        $.ajax({
            type: "POST",
            url: "php/controller/logged.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    window.location.href = "utilisateur_liste";
                }else if(parseInt(msg)==2){
                    window.location.href = "utilisateur_liste";
                }else if(parseInt(msg)==3){
                    window.location.href = "crechepaiement_liste";
                }else if(parseInt(msg)==4){
                    window.location.href = "crechejournaliere_liste";
                }else if(parseInt(msg)==0){ 
                    swal("Erreur", "Login ou mot de passe incorrect", "warning");
                }else if(parseInt(msg)==6){ 
                    swal("Erreur", "Votre compte a été désactivé", "error");
                }else{ 
                    swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", "error");
                }
                // alert(msg); 
            },
            error: function(){
                swal( "Désolé", "Une erreur est survenue veuillez contacter l'administrateur", "error");
            }
        });
    });
    
    
});
