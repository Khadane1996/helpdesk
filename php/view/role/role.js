$(function(){
    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/role.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    // M.toast({html: '<span style="color:#fff;"></span>'}, 3000);
                    swal("Ok", "Les informations sur l'inscription ont été ajouté avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        $("#form1").css("display", "none");
                        $("input[name=form1]").attr("required", false);

                        $("#form2").css("display", "block");
                        $("input[name=form2]").attr("required", true);
                        var anneeScolaire = document.getElementById("anneeScolaire").value;
                        $("#anneeScolaire2").val(anneeScolaire);
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==99){ 
                    M.toast({html: '<span style="color:#fff;">Cette classe doit avoir au minimum un horaire pour le choix de l\'inscription;</span>'}, 3000);
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

    $('#monForm2').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            method: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Les informations sur l'identification de l'élève ont été ajouté avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        $("#form2").css("display", "none");
                        $("input[name=form2]").attr("required", false);

                        $("#form3").css("display", "block");
                        $("input[name=form3]").attr("required", true);
                    });
                }else if(parseInt(msg)==2){ 
                    swal("Erreur", "Cet élève existe déja dans une des classes de cette année scolaire", 'error');
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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

    $('#monForm3').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            method: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Les informations sur les parents de l'élève ont été ajouté avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        $("#form3").css("display", "none");
                        $("input[name=form3]").attr("required", false);

                        $("#form4").css("display", "block");
                        $("input[name=form4]").attr("required", true);
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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

    $('#monForm4').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            method: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Les informations sur les accompagnants de l'élève ont été ajouté avec succès", 'success');
                    $(document).click(function(){
                        window.location.href = "creche_liste";
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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
    
    $('#monFormModal').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "La fiche journalière a été ajoutée avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        location.reload();
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "La suivie a été modifié avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        location.reload();
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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

    $('#monFormMod2').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Les identifications de l'élève ont été modifié avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        location.reload();
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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

    $('#monFormMod3').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                if(parseInt(msg)==1){
                    swal("Ok", "Les parents de l'élève ont été modifié avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        location.reload();
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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

    $('#monFormMod4').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/role.php", //process to mail
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(msg){
                alert(msg)
                if(parseInt(msg)==1){
                    swal("Ok", "Les accompagnants de l'élève ont été modifié avec succès", 'success');
                    $(document).click(function(){
                        // window.location.href = "creche_liste";
                        location.reload();
                        // window.location.href = 'creche_details-1#test4';
                    });
                }else if(parseInt(msg)==-2){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me code affaire existe déj&agrave;</span>'}, 3000);
                }else if(parseInt(msg)==-3){ 
                    M.toast({html: '<span style="color:#fff;">Un creche avec le m&ecirc;me libellé existe déj&agrave;</span>'}, 3000);
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
                    M.toast({html: '<span style="color:#fff;">Un événement avec le m&ecirc;me titre existe déj&agrave; pour ce creche</span>'}, 3000);
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
                    M.toast({html: '<span style="color:#fff;">Un événement avec le m&ecirc;me titre existe déj&agrave; pour ce creche</span>'}, 3000);
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
    var idcreche = $(".idcreche").attr("value");
    $.ajax({
      type: "POST",
      url: "php/controller/evenement.php?reloadEvenement&idcreche="+idcreche, //process to mail
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