$(function(){
    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/tableaubord.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    // M.toast({html: '<span style="color:#fff;"></span>'}, 3000);
                    swal("Ok", "Le tableaubord a été ajouté avec succès", 'success');
                    $(document).click(function(){
                        window.location.href = "tableaubord_liste";
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un tableaubord avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un tableaubord avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
                }else{ 
                    swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", 'error');
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });
    
    $('#monFormMod').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/tableaubord.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Le tableaubord a été modifié avec succès", 'success');
                    $(document).click(function(){
                        window.location.href = "tableaubord_liste";
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un tableaubord avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un tableaubord avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
                }else{ 
                    swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", 'error');
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });

    $('#monFormAddEvenement').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "php/controller/evenement.php", //process to mail
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    // M.toast({html: '<span style="color:#fff;"></span>'}, 3000);
                    swal("Ok", "L'événement a été ajouté avec succès", 'success');
                    reloadEvenement();
                    $("#modalAddEvenement").modal2("toggle");
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un événement avec le m&ecirc;me titre existe déj&agrave; pour ce tableaubord</span>'}, 3000);
                }else{ 
                    swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", 'error');
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });

    $('#monFormModEvenement').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "php/controller/evenement.php", //process to mail
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    // M.toast({html: '<span style="color:#fff;"></span>'}, 3000);
                    swal("Ok", "L'événement a été modifié avec succès", 'success');
                    reloadEvenement();
                    $("#modalModEvenement").modal2("toggle");
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un événement avec le m&ecirc;me titre existe déj&agrave; pour ce tableaubord</span>'}, 3000);
                }else{ 
                    swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", 'error');
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });
});


function reloadEvenement(){
    $('.loaderMessage').addClass('is-active'); 
    var idtableaubord = $(".idtableaubord").attr("value");
    $.ajax({
      type: "POST",
      url: "php/controller/evenement.php?reloadEvenement&idtableaubord="+idtableaubord, //process to mail
      data: "",
      mimeType: "multipart/form-data",
      contentType: false,
      cache: false,
      processData: false,
      success: function(msg){
        var contenu = msg.split("#$#");
        if($.isNumeric(contenu[0])){
            $("#evenement").html(contenu[1]);
            $('.tooltipped').tooltip();
        }else{ 
            swal("Désolé", "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard", 'error');
        }
        console.log(msg);
        $('.loaderMessage').removeClass('is-active');
      },
      error: function(){
          $('.loaderMessage').removeClass('is-active');
          swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
      }
    });

  }