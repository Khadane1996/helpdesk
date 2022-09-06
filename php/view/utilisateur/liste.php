<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpDesk | Utilisateur</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">

   <!-- DataTables -->
 <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">


 <!-- Include navbar et menu début -->
 <?php
    include('../../../navbar.php');
    include('../../../menu.php');
  ?>
  <!-- Include navbar et menu fin -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-plus"></i> ajouter</button></li> -->
              <li>
                <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo"><i class="fa fa-plus"></i> ajouter</button>

              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gestion des utilisateurs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>&#8470;</th>
                    <th>Nom complet</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Profil</th>
                    <th>Login</th>
                    <th>Status</th>
                    <!-- <th>Profil</th> -->
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <?php 
                      require_once('../../../php/classe/classeUtilisateur.php');
                      $Utilisateur = new Utilisateur();
                      $list = $Utilisateur->listUtilisateur();
                      $i = 1;
                      foreach($list as $value){
                    ?>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['prenom']." " .$value['nom'] ?> </td>
                    <td><?php echo $value['telephone'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['role'] ?></td>
                    <td><?php echo $value['login'] ?></td>
                   
                    <td class="project-state"><?php
                    if($value['etat'] == '1')
                    {
                      echo '<span class="badge badge-success">Actif</span>';
                    }
                    else
                    {
                      echo '<span class="badge badge-danger">Désactivé</span>';
                    }
                    ?></td>

                    <td class="project-actions text-right">
                          <a  class="btn btn-primary btn-sm"  href="#"  >
                              <i class="fas fa-eye">
                              </i>
                              Voir
                          </a>
                          <a onclick="modifier('<?php echo $value['idUtilisateur'] ?>')" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg2" data-whatever="@mdo">
                              <!-- <i class="fas fa-pencil-alt">
                              </i> -->
                              Modifier
                          </a>
                          <a onclick="supprimer('<?php echo $value['idUtilisateur'] ?>')" class="btn btn-danger btn-sm" href="#">
                              <!-- <i class="fas fa-trash">
                              </i> -->
                              Supprimer
                          </a>
                    </td>

                  </tr>
                  <?php 
                    }
                   ?>
                  

                    <th>&#8470;</th>
                    <th>Nom complet</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Profil</th>
                    <th>Login</th>
                    <th>Status</th>
                    <!-- <th>Profil</th> -->
                    <th>Option</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- modals debut -->


      <!-- ajouter utilisateur debut -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ajouter utilisateur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="monForm">
                          
                            <div class="row">
                              <div class="col-6 col-sm-6"> <!-- col s12 m3 l3  -->
                                <div class="form-group">
                                  <label for="prenom" class="col-form-label">Prénom</label>
                                  <input required type="text" class="form-control" id="prenom" name="prenom">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="nom" class="col-form-label">Nom</label>
                                  <input required type="text" class="form-control" id="nom" name="nom">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="telephone" class="col-form-label">Téléphone</label>
                                  <input required type="text" class="form-control" id="telephone" name="telephone">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="email" class="col-form-label">Email</label>
                                  <input required type="email" class="form-control" id="email" name="email">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="adresse" class="col-form-label">Adresse</label>
                                  <input required type="adresse" class="form-control" id="adresse" name="adresse">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Role</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idRole" name="idRole">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listRole();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idRole'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="login" class="col-form-label">Login</label>
                                  <input type="text" class="form-control" id="login" name="login">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="motDePasse" class="col-form-label">Mot de passe</label>
                                  <input type="password" class="form-control" id="motDePasse" name="motDePasse">
                                </div>
                              </div>
                              <!-- <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="cmotDePasse" class="col-form-label">Confirmer mot de passe</label>
                                  <input type="password" class="form-control" id="cmotDePasse" name="cmotDePasse">
                                </div>
                              </div> -->
                            </div>
                            
                            <input type="hidden" name="ajouter">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary" name="action">Créer</button>
                            </div>
                          </form>
                        </div>   
                      </div>
                    </div>
                  </div>
                  <!-- ajouter utilisateur fin -->




                 

    <!-- modals fin -->



  </div>
  <!-- /.content-wrapper -->




   <!-- Include footer début -->
   <?php
    include('../../../footer.php');
  ?>
  <!-- Include footer fin -->

  <script type="text/javascript" src="utilisateur.js"></script>


<!-- ./wrapper -->
<script type="text/javascript">
  
  function supprimer(idElement){
    Swal.fire({
      title: 'Êtes vous sur?',
      text: "Vous ne pourrez pas revenir en arrière!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui'
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "GET",
              url: "../../controller/utilisateur.php?supprimer="+idElement, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                    Swal.fire(
                      'Supprimé!',
                      'Cet utilisateur a été supprimée.',
                      'success'
                    )
                    location.reload();
                  }else{ 
                    // Swal.fire(
                    //   'Deleted!',
                    //   'Your file has been deleted.',
                    //   'success'
                    // )
                  }
              },
              error: function(){
                  // Swal.fire(
                  //   'Deleted!',
                  //   'Your file has been deleted.',
                  //   'success'
                  // )
              }
          });
      }
    })
  }


  function modifier(prenom,nom,telephone,email,adresse,idRole,login,motDePasse,idElement){
    $("#prenom2").val(prenom);
    $("#nom2").val(nom);
    $("#telephone2").val(telephone);
    $("#email2").val(email);
    $("#adresse2").val(adresse);
    $("#idRole2").val(idRole);
    $("#login2").val(login);
    $("#motDePasse2").val(motDePasse);
    $("#modifier").val(idElement);
  }

</script>