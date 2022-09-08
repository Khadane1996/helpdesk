$(function(){
    
    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: "../../controller/utilisateur.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    Swal.fire(
                    'Réussi!',
                    'Cet utilisateur a été ajouté avec succès!',
                    'success'
                    )
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        window.location.reload();
                    });
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


    $('#monFormMod').on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: "../../controller/utilisateur.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    Swal.fire(
                    'Réussi!',
                    'Cet utilisateur a été modifié avec succès!',
                    'success'
                    )
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        window.location.reload();
                    });
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


    $('#monFormIns').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        if($("#motDePasse").val() == $("#motDePasse2").val()){
            $.ajax({
                type: "POST",
                url: "../../controller/utilisateur.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    if(parseInt(msg)==1){
                        Swal.fire(
                            'Réussi!',
                            'Inscription réussi!',
                            'success'
                            )
                            $(document).click(function(){
                                window.location.href = "index.php";
                                // window.location.reload();
                            });
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
                    $('.loaderMessage').removeClass('is-active');
                    Swal.fire(
                        'Désolé!',
                        'Une erreur est survenue veuillez contacter l\'administrateur',
                        'error'
                    )                }
            });
        }
        else{
             $('.loaderMessage').removeClass('is-active');
            Swal.fire(
                'Erreur!',
                'Les mots de passe saisis ne sont pas identique, veuillez les v&eacute;rifier ou les resaisir',
                'error'
                )
        }
    });
    
        
});
    
    