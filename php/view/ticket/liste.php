<!DOCTYPE html>
<?php
@session_start();  

if(!isset($_SESSION['helpdeskconnected'])){

    header("location:../../../index.php");

}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpDesk | Ticket</title>

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
            <h1>Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-plus"></i> ajouter</button></li> -->
              <?php
                if(isset($_SESSION['helpdeskadministrateur']) || isset($_SESSION['helpdesksimple'])){
              ?>
              <li>
                <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo"><i class="fa fa-plus"></i> ajouter</button>
               
              </li>
              <?php } ?>
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
                <h3 class="card-title">Gestion des tickets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>&#8470;</th>
                    <th>Description</th>
                    <th>Priorité</th>
                    <th>Catégorie</th>
                    <th>Status</th>
                    

                    <?php
                        if(isset($_SESSION['helpdeskadministrateur']) || isset($_SESSION['helpdesktechnicien'])){
                    ?>
                    <th>Auteur</th>
                    <?php } ?>

                    <?php
                        if(isset($_SESSION['helpdeskadministrateur'])){
                    ?>
                    <th>Assigné à</th>
                    <?php } ?>

                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    require_once('../../../php/classe/classeTicket.php');
                    $Ticket = new Ticket();
                    // $list = $Ticket->listTicket($_SESSION['helpdeskidUtilisateur']);
                    if(isset($_SESSION['helpdeskadministrateur'])){
                      $list = $Ticket->listTicket($_SESSION['helpdeskidUtilisateur']);
                    }else if(isset($_SESSION['helpdesktechnicien'])){
                      $list = $Ticket->listTicketTechnicien($_SESSION['helpdeskidUtilisateur']);
                    }
                    else if(isset($_SESSION['helpdesksimple'])){
                      $list = $Ticket->listTicketAuteur($_SESSION['helpdeskidUtilisateur']);
                    }
                    $i = 1;
                    foreach($list as $value){
                   ?>
                   
                  <tr>
                    <td class="project-actions text-right"><?php echo $i++; ?></td>
                    <th><?php echo $value['description'] ?></th>
                    <th><?php echo $value['priorite'] ?></th>
                    <th><?php echo $value['categorie'] ?></th>
                    <th><?php echo $value['status'] ?></th>

                    <?php
                        if(isset($_SESSION['helpdeskadministrateur'])  || isset($_SESSION['helpdesktechnicien'])){
                    ?>
                    <th><?php echo $value['prenomAuteur'] ?></th>
                    <?php } ?>


                    <?php
                        if(isset($_SESSION['helpdeskadministrateur'])){
                    ?>
                    <th><?php echo $value['prenomAgent'] ?></th>
                    <?php } ?>


                    <td class="project-actions text-right">
                          <a  onclick="voir('<?php echo $value['idPriorite'] ?>','<?php echo $value['idCategorie'] ?>','<?php echo $value['idStatus'] ?>','<?php echo $value['idAuteur'] ?>','<?php echo $value['idAssigne'] ?>','<?php echo $value['idTicket'] ?>')" class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target=".bd-example-modal-lg3" data-whatever="@mdo">
                              <i class="fas fa-eye">
                              </i>
                              Voir
                          </a> 
                          <a onclick="modifier('<?php echo $value['idPriorite'] ?>','<?php echo $value['idCategorie'] ?>','<?php echo $value['idStatus'] ?>','<?php echo $value['idAuteur'] ?>','<?php echo $value['idAssigne'] ?>','<?php echo $value['idTicket'] ?>')" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg2" data-whatever="@mdo">
                              <!-- <i class="fas fa-pencil-alt">
                              </i> -->
                              Modifier
                          </a>
                          <?php
                            if(isset($_SESSION['helpdeskadministrateur']) || isset($_SESSION['helpdesksimple'])){
                          ?>
                          <a onclick="supprimer('<?php echo $value['idTicket'] ?>')" class="btn btn-danger btn-sm" href="#">
                              <!-- <i class="fas fa-trash">
                              </i> -->
                              Supprimer
                          </a>
                          <?php } ?>
                    </td>
                  </tr>
                  <?php 
                    }
                   ?>
                              
                  </tbody>
                  <tfoot>
                  <!-- <tr>
                    <th>&#8470;</th>
                    <th>Description</th>
                    <th>Priorité</th>
                    <th>Catégorie</th>
                    <th>Status</th>
                    <th>Auteur</th>
                    <th>Assigné à</th>
                    <th>Option</th>
                  </tr> -->
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

      <!-- ajouter ticket debut -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ajouter  ticket</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="monForm">
                            <div class="row">
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Priorite</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idPriorite" name="idPriorite">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classePriorite.php');
                                          $Priorite = new Priorite();
                                          $list = $Priorite->listPriorite();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idPriorite'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Categorie</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idCategorie" name="idCategorie">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeCategorie.php');
                                          $Categorie = new Categorie();
                                          $list = $Categorie->listCategorie();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idCategorie'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idStatus" name="idStatus">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeStatus.php');
                                          $Status = new Status();
                                          $list = $Status->listStatus();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idStatus'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Auteur</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idAuteur" name="idAuteur">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listUtilisateur();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom']. " " .$value['nom'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="description" class="col-form-label">Description</label>
                                  <input type="text" class="form-control" id="description" name="description">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Assigne à</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idAssigne" name="idAssigne">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listAgentActif();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom']. " " .$value['nom'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>
                             </div>
                                <input type="hidden" name="ajouter">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-primary" name="action">Créer</button>
                                </div>
                            </div>
                          </form>
                        </div>   
                      </div>
                    </div>
                  </div>
                  <!-- ajouter ticket fin -->
                  
                   <!-- modifier ticket debut -->
                   <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier  ticket</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="monFormMod">
                            <div class="row">
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Priorite</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idPriorite2" name="idPriorite">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classePriorite.php');
                                          $Priorite = new Priorite();
                                          $list = $Priorite->listPriorite();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idPriorite'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Categorie</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idCategorie2" name="idCategorie">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeCategorie.php');
                                          $Categorie = new Categorie();
                                          $list = $Categorie->listCategorie();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idCategorie'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idStatus2" name="idStatus">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeStatus.php');
                                          $Status = new Status();
                                          $list = $Status->listStatus();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idStatus'] ?>"><?php echo $value['libelle'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Auteur</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idAuteur2" name="idAuteur">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listUtilisateur();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom']. " " .$value['nom'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="description" class="col-form-label">Description</label>
                                  <input type="text" class="form-control" id="description2" name="description">
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Assigne à</label>
                                  <select required="" class="form-control select2" style="width: 100%;" id="idAssigne2" name="idAssigne">
                        
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listAgentActif();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom']. " " .$value['nom'] ?></option>
                                      <?php }
                                      ?>
                                  </select>
                                </div>
                              </div>
                             </div>
                                <input type="hidden" name="modifier" id="modifier">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-primary" name="action">Appliquer changements</button>
                                </div>
                            </div>
                          </form>
                        </div>   
                      </div>
                    </div>
                  </div>
                  <!-- modifier ticket fin -->
                  
                  <!-- infos ticket debut -->
                  <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Informations  ticket</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="#">
                            <div class="row">
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Priorite</label>
                                  <h6 id="idPriorite2" value="<?php echo $value['idPriorite'] ?>"><?php echo $value['libelle'] ?></h6>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Categorie</label>
                                  <h6 id="idCategorie2" value="<?php echo $value['idCategorie'] ?>"><?php echo $value['libelle'] ?></h6>
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Status</label>
                                  <h6 id="idStatus2" value="<?php echo $value['idStatus'] ?>"><?php echo $value['libelle'] ?></h6>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Auteur</label>
                                  <h6 id="idAuteur2" value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom'] ?></h6>
                                </div>
                              </div>

                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label for="description" class="col-form-label">Description</label>
                                  <h6 value="" id="description2"></h6>
                                </div>
                              </div>
                              <div class="col-6 col-sm-6">
                                <div class="form-group">
                                  <label>Assigne à</label>
                                  <h6 id="idAssigne2" value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom'] ?></h6>
                                </div>
                              </div>
                             </div>
                                <input type="hidden" name="">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                                  <!-- <button type="submit" class="btn btn-primary" name="">Créer</button> -->
                                </div>
                            </div>
                          </form>
                        </div>   
                      </div>
                    </div>
                  </div>
                  <!--  infos  ticket fin -->

  </div>
  <!-- /.content-wrapper -->







   <!-- Include footer début -->
   <?php
    include('../../../footer.php');
  ?>
  <!-- Include footer fin -->

  <script type="text/javascript" src="ticket.js"></script>

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
              url: "../../controller/ticket.php?supprimer="+idElement, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                    Swal.fire(
                      'Supprimé!',
                      'Ce ticket a été supprimée.',
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

  function modifier(idPriorite,idCategorie,idStatus,idAuteur,idAssigne,idTicket){
    $("#idPriorite2").val(idPriorite);
    $("#idCategorie2").val(idCategorie);
    $("#idStatus2").val(idStatus);
    $("#idAuteur2").val(idAuteur);
    // $("#description2").val(description);
    $("#idAssigne2").val(idAssigne);
    $("#modifier").val(idTicket);
    alert(idAssigne)
  }

  function voir(idPriorite,idCategorie,idStatus,idAuteur,description,idAssigne,idTicket){
    $("#idPriorite2").val(idPriorite);
    $("#idCategorie2").val(idCategorie);
    $("#idStatus2").val(idStatus);
    $("#idAuteur2").val(idAuteur);
    $("#description2").val(description);
    $("#idAssigne2").val(idAssigne);
    $("#voir").val(idTicket);
  
  }


</script>
