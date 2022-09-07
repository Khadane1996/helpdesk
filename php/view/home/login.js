$(function(){

    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: "php/controller/logged.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    Swal.fire(
                    'Réussi!',
                    'Connexion réussie!',
                    'success'
                    )
                    $(document).click(function(){
                        window.location.href = "php/view/dashboard/liste.php";
                        // window.location.reload();
                    });
                }else if(parseInt(msg)==0){ 
                    Swal.fire(
                        'Désolé!',
                        'Login ou mot de passe incorrect',
                        'error'
                        )
                }else if(parseInt(msg)==6){ 
                    Swal.fire(
                        'Désolé!',
                        'Votre compte a été désactivé',
                        'error'
                        )
                }else{ 
                    Swal.fire(
                    'Désolé!',
                    'Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard',
                    'error'
                    )
                }
            // alert(msg);
            $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                Swal.fire(
                    'Désolé!',
                    'Une erreur est survenue veuillez contacter l\'administrateur',
                    'error'
                )
            }
        });
    });  
    

});



