$(function(){
    
$('#monForm').on('submit', function(e) {
    e.preventDefault(); 
    $.ajax({
        type: "POST",
        url: "../../controller/priorite.php", //process to mail
        data: $(this).serialize(),
        success: function(msg){
            if(parseInt(msg)==1){
                Swal.fire(
                'Réussi!',
                'Cette priorité a été ajoutée avec succès!',
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
        url: "../../controller/priorite.php", //process to mail
        data: $(this).serialize(),
        success: function(msg){
            
            if(parseInt(msg)==1){
                Swal.fire(
                'Réussi!',
                'Cette priorité a été modifiée avec succès!',
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
    
});

