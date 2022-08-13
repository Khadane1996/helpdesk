$(function(){

    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        if($("#motDePasse").val() == $("#cmotDePasse").val()){
            $.ajax({
                type: "POST",
                url: "php/controller/utilisateur.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    if(parseInt(msg)==1){
                        swal({ title: "Bravo !", text: "L'utilisateur a été ajouté avec succès", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            // window.location.href = "utilisateur_liste";
                            app.getAllUsers();
                        });
                        $('#exampleModal').modal('hide');
                    }else if(parseInt(msg)==2){ 
                        swal({ title: "Erreur", text: "Ce nom d'utilisateur est d&eacute;j&agrave; utilis&eacute; par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==3){ 
                        swal({ title: "Erreur", text: "Cette adresse email est d&eacute;j&agrave; utilis&eacute;e par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==4){ 
                        swal({ title: "Erreur", text: "Ce matricule est d&eacute;j&agrave; utilis&eacute; par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==10){
                        swal({ title: "Bravo !", text: "L'utilisateur a été modifié avec succès", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            // window.location.href = "utilisateur_liste";
                            app.getAllUsers();
                        });
                        $('#exampleModal').modal('hide');
                    }
                    else{ 
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'images/icones/errorDb.png', html: true});
                    }
                   // alert(msg);
                   $('.loaderMessage').removeClass('is-active');
                },
                error: function(){
                    $('.loaderMessage').removeClass('is-active');
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
                }
            });
        }
        else{
             $('.loaderMessage').removeClass('is-active');
            swal({ title: "Erreur", text: "Les mots de passe saisis ne sont pas identique, veuillez les vérifier ou les resaisir", imageUrl: 'images/icones/errorPass.png', html: true});
        }
    });
    
    $('#monFormMod').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/utilisateur.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Bravo !", text: "L'utilisateur a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s", imageUrl: 'images/icones/success.png', html: true});
                    $(document).click(function(){
                        window.location.href = "utilisateur_liste";
                    });
                }else if(parseInt(msg)==2){ 
                    swal({ title: "Erreur", text: "Ce nom d'utilisateur est d&eacute;j&agrave; utilis&eacute; par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }else if(parseInt(msg)==3){ 
                    swal({ title: "Erreur", text: "Cette adresse email est d&eacute;j&agrave; utilis&eacute;e par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }else if(parseInt(msg)==4){ 
                    swal({ title: "Erreur", text: "Ce matricule est d&eacute;j&agrave; utilis&eacute; par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }
                else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'images/icones/errorDb.png', html: true});
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });


    $('#monFormUpdateProfile').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active'); 
        if($("#motDePasse").val() == $("#motDePasse2").val()){
            $.ajax({
                type: "POST",
                url: "php/controller/utilisateur.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    if(parseInt(msg)==1){
                        swal({ title: "Bravo !", text: "Votre mot de passe a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s. <br>Lors de votre prochaine connexion, c'est ce nouveau mot de passe que vous devez utiliser", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            location.reload();
                        });
                    }else if(parseInt(msg)==2){ 
                        swal({ title: "Erreur", text: "Le 'Mot de passe actuel' que vous avez saisi ne correspond &agrave; celui de votre compte", imageUrl: 'images/icones/error.png', html: true});
                    }
                   // alert(msg);
                   $('.loaderMessage').removeClass('is-active');
                },
                error: function(){
                    $('.loaderMessage').removeClass('is-active');
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
                }
            });
        }else{
             $('.loaderMessage').removeClass('is-active');
            swal({ title: "Erreur", text: "Les nouveaux mots de passe saisis ne sont pas identiques, veuillez les v&eacute;rifier ou les resaisir", imageUrl: 'images/icones/errorPass.png', html: true});
        } 
    });

    // var app = new Vue({
    //     el: '#app',
    //     data: {
    //         errorMsg: "",
    //         users: [],
    //         newUser: {nomComplet: "", mail: "", adresse: "", telephone: "", login: "", motDePasse: ""},
    //         currentUser: {},
    //         roles: []
    //     },
    //     mounted: function(){
    //         this.getAllUsers();
    //     },
    //     methods: {
    //         getAllUsers(){
    //             axios.get("http://localhost/autoecole/php/controller/utilisateur.php?read").then( function(response){
    //                 if(response.success = false){
    //                     app.errorMsg = response.success;
    //                 }else{
    //                     app.users = response.data.users;
    //                 }
    //             });
    //         },
    //         getRole(){
    //             axios.get("http://localhost/autoecole/php/controller/utilisateur.php?role").then( function(response){
    //                 if(response.success = false){
    //                     app.errorMsg = response.success;
    //                 }else{
    //                     app.roles = response.data.roles;
    //                 }
    //             });
    //         },
    //         addUser(){
    //             if($("#nomComplet").val() != "" && $("#email").val() != "" && $("#adresse").val() != "" && $("#telephone").val() != "" && $("#login").val() != "" && $("#motDePasse").val() != "" && $("#cmotDePasse").val() != ""){
    //                 if($("#motDePasse").val() == $("#cmotDePasse").val()){
    //                     var formData = app.toFormData(app.newUser);
    //                     axios.post("http://localhost/autoecole/php/controller/utilisateur.php?send", formData).then( function(response){
    //                         app.newUser = {nomComplet: "", mail: "", adresse: "", telephone: "", login: "", motDePasse: ""};
    //                         console.log('test',app.newUser);
    //                         if(response.success = false){
    //                             app.errorMsg = response.success;
    //                         }else{
    //                             app.getAllUsers();
    //                         }
    //                     });      
    //                 }else{
    //                     $('.loaderMessage').removeClass('is-active');
    //                     swal({ title: "Erreur", text: "Les mots de passe saisis ne sont pas identique, veuillez les vérifier ou les resaisir", imageUrl: 'images/icones/errorPass.png', html: true});
    //                 }
    //             }else{
    //                     $('.loaderMessage').removeClass('is-active');
    //                     swal({ title: "Erreur", text: "Veuillez renseigner tous les champs du formulaire", imageUrl: 'images/icones/errorPass.png', html: true});
    //                 }
    //         },
    //         toFormData(obj){
    //             var fd = new FormData();
    //             for(var i in obj){
    //                 fd.append(i,obj[i]);
    //             }
    //             return fd;
    //         },
    //         ajouter(){
    //             document.getElementById("titre").innerHTML = 'Ajouter utilisateur';
            
    //             $("#nomComplet").val('');
    //             $("#email").val('');
    //             $("#telephone").val('');
    //             $("#login").val('');
    //             $("#idRole").val(1);
    //             $("#adresse").val('');
    //             $("#modifier").val('');
    //             $("#motDePasse").val('');
    //             $("#cmotDePasse").val('');
            
    //            //Désactive un élément
    //             document.getElementById('modifier').disabled = true;
    //             //Active un élément
    //             document.getElementById('ajouter').disabled = false; 
    //         },
    //         myDetails(nomComplet,email,telephone,login,idRole,adresse,idUtilisateur,motDePasse){
    //             document.getElementById("titre").innerHTML = 'Modifier utilisateur';
            
    //             //Désactive un élément
    //             document.getElementById('ajouter').disabled = true;
    //             //Active un élément
    //             document.getElementById('modifier').disabled = false;
            
    //             $("#nomComplet").val(nomComplet);
    //             $("#email").val(email);
    //             $("#telephone").val(telephone);
    //             $("#login").val(login);
    //             $("#idRole").val(idRole);
    //             $("#adresse").val(adresse);
    //             $("#modifier").val(idUtilisateur);
    //             $("#motDePasse").val(motDePasse);
    //             $("#cmotDePasse").val(motDePasse);
    //         },
    //         supprimer(idElement){
    //             swal({
    //               title: "Supprimer utilisateur",
    //               text: "Êtes-vous sûr de vouloir supprimer cet utilisateur ?",
    //               icon: 'warning',
    //               dangerMode: true,
    //               buttons: {
    //                 cancel: 'Non',
    //                 delete: 'Oui'
    //               }
    //             }).then(function (willDelete) {
    //               if (willDelete) {
    //                 $('.loaderMessage').addClass('is-active'); 
    //                 $.ajax({
    //                   type: "GET",
    //                   url: "php/controller/utilisateur.php?supprimer="+idElement, 
    //                   data: $(this).serialize(),
    //                   success: function(msg){
    //                       if(parseInt(msg)==1){
    //                         app.getAllUsers();
    //                       }else{ 
    //                         swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
    //                       }
    //                      $('.loaderMessage').removeClass('is-active');
    //                   },
    //                   error: function(){
    //                       $('.loaderMessage').removeClass('is-active');
    //                       swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
    //                   }
    //               });
    //               } else {
    //                 swal.close();
    //               }
    //             });
    //           }
    //     }
    // });
    
});


