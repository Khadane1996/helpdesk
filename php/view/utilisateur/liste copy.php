<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>

<style>
.modal-lg {
    max-width: 70% !important;
    bottom: 60px;
}
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="font-weight-bold">Liste utilisateur</h3>
            <div class="template-demo" style="padding: 8px">
                <button type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal" onclick="ajouter()">Ajouter</button>
            </div>

            <div class="table-responsive" style="padding: 12px">
                <table class="table table-striped" id="order-listing">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Login</th>
                        <th>Role</th>
                        <th>Adresse</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once('php/classe/classeUtilisateur.php');
                        $Utilisateur= new Utilisateur();
                        $list = $Utilisateur->listUtilisateur();
                        $i = 1;
                        foreach($list as $value){
                        echo '
                            <tr id="'.$value['idUtilisateur'].'">
                                <td class="py-1"><img src="assets/images/faces/face1.jpg" alt="image"/></td>
                                <td>'.$value['nomComplet'].'</td>
                                <td>'.$value['email'].'</td>
                                <td>'.$value['telephone'].'</td>
                                <td>'.$value['login'].'</td>
                                <td>'.$value['role'].'</td>
                                <td>'.$value['adresse'].'</td>
                                <td>
                                    <button type="button" onclick="supprimer('.$value['idUtilisateur'].')" class="btn btn-danger btn-rounded btn-icon">
                                        <i class="ti-trash" style="margin: -5px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" onclick="myDetails(\''.$value['nomComplet'].'\',\''.$value['email'].'\',\''.$value['telephone'].'\',\''.$value['login'].'\',\''.$value['idRole'].'\',\''.$value['adresse'].'\',\''.$value['idUtilisateur'].'\',\''.$value['motDePasse'].'\')">
                                        <i class="ti-pencil-alt" style="margin: -5px;"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
                        }
                    ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal début -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4B49AC;">
        <h5 class="modal-title" id="titre" style="color: #FFF">Ajouter utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" id="monForm">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nomComplet">Nom complet</label>
                        <input required type="text" name="nomComplet" class="form-control" id="nomComplet" placeholder="Nom complet">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input required type="tel" name="telephone" class="form-control" id="telephone" placeholder="Téléphone">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input required type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleSelectGender">Role</label>
                        <select required="" class="form-control" id="idRole" name="idRole">
                        <?php
                            require_once('php/classe/classeUtilisateur.php');
                            $Utilisateur = new Utilisateur();
                            $list = $Utilisateur->listRole();
                            foreach($list as $value){
                                ?>
                                <option value="<?php echo $value['idRole']; ?>"><?php echo $value['libelle']; ?></option>
                            <?php  }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input required type="text" name="login" class="form-control" id="login" placeholder="Login">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="motDePasse">Mot de passe</label>
                        <input required type="password" name="motDePasse" class="form-control" id="motDePasse" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cmotDePasse">Confirmer mot de passe</label>
                        <input required type="password" name="cmotDePasse" class="form-control" id="cmotDePasse" placeholder="Confirmer mot de passe">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="ajouter" id="ajouter">
                    <input type="hidden" name="modifier" id="modifier">
                    <button type="submit" class="btn btn-primary mr-2">Valider</button>
                    <button class="btn btn-light" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal fin -->

<script type="text/javascript">

function ajouter(){
    document.getElementById("titre").innerHTML = 'Ajouter utilisateur';

    $("#nomComplet").val('');
    $("#email").val('');
    $("#telephone").val('');
    $("#login").val('');
    $("#idRole").val(1);
    $("#adresse").val('');
    $("#modifier").val('');
    $("#motDePasse").val('');
    $("#cmotDePasse").val('');

   //Désactive un élément
    document.getElementById('modifier').disabled = true;
    //Active un élément
    document.getElementById('ajouter').disabled = false;
    
}

function myDetails(nomComplet,email,telephone,login,idRole,adresse,idUtilisateur,motDePasse){

    document.getElementById("titre").innerHTML = 'Modifier utilisateur';

    //Désactive un élément
    document.getElementById('ajouter').disabled = true;
    //Active un élément
    document.getElementById('modifier').disabled = false;

    $("#nomComplet").val(nomComplet);
    $("#email").val(email);
    $("#telephone").val(telephone);
    $("#login").val(login);
    $("#idRole").val(idRole);
    $("#adresse").val(adresse);
    $("#modifier").val(idUtilisateur);
    $("#motDePasse").val(motDePasse);
    $("#cmotDePasse").val(motDePasse);
}

  function supprimer(idElement){
    swal({
      title: "Supprimer utilisateur",
      text: "Êtes-vous sûr de vouloir supprimer cet utilisateur ?",
      icon: 'warning',
      dangerMode: true,
      buttons: {
        cancel: 'Non',
        delete: 'Oui'
      }
    }).then(function (willDelete) {
      if (willDelete) {
        $('.loaderMessage').addClass('is-active'); 
        $.ajax({
          type: "GET",
          url: "php/controller/utilisateur.php?supprimer="+idElement, 
          data: $(this).serialize(),
          success: function(msg){
              if(parseInt(msg)==1){
                location.reload();
                // swal.close();
                // M.toast({html: '<span style="color:#fff;">Suppression effectu&eacute;e avec succ&egrave;s</span>'}, 3000);
                
              }else{ 
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
              }
             $('.loaderMessage').removeClass('is-active');
          },
          error: function(){
              $('.loaderMessage').removeClass('is-active');
              swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
          }
      });
      } else {
        swal.close();
      }
    });
  }
</script>