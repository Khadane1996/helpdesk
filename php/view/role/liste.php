<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpDesk | Role</title>

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
            <h1>Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-plus"></i> ajouter</button></li> -->
              <li>
                <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo"><i class="fa fa-plus"></i> ajouter</button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="monForm">
                         
                          <div class="row">
                            <div class="col-12 col-sm-12"> <!-- col s12 m3 l3  -->
                              <div class="form-group">
                                <label for="libelle" class="col-form-label">Libelle</label>
                                <input required type="text" class="form-control" id="libelle" name="libelle">
                              </div>
                            </div>
                            
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
                <h3 class="card-title">Gestion des roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>&#8470;</th>
                    <th>Libellé</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                    require_once('../../../php/classe/classeUtilisateur.php');
                    $Utilisateur = new Utilisateur();
                    $list = $Utilisateur->listRole();
                    $i = 1;
                    foreach($list as $value){
                   ?>
                   
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <th><?php echo $value['libelle'] ?></th>
                    <td class="project-actions text-right">
                          <!-- <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-eye">
                              </i>
                              Voir
                          </a> -->
                          <a onclick="modifier('<?php echo $value['libelle'] ?>','<?php echo $value['idRole'] ?>')" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg2" data-whatever="@mdo">
                              <!-- <i class="fas fa-pencil-alt">
                              </i> -->
                              Modifier
                          </a>
                          <!-- <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a> -->
                    </td>
                  </tr>
                  <?php 
                    }
                   ?>
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>&#8470;</th>
                    <th>Libellé</th>
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

    <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="monFormMod">
              
              <div class="row">
                <div class="col-12 col-sm-12"> <!-- col s12 m3 l3  -->
                  <div class="form-group">
                    <label for="libelle" class="col-form-label">Libelle</label>
                    <input required type="text" class="form-control" id="libelle2" name="libelle">
                  </div>
                </div>
                
              </div>
              <input type="hidden" id="modifier" name="modifier">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="action">Appliquer changement</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.content-wrapper -->




   <!-- Include footer début -->
  <?php
    include('../../../footer.php');
  ?>
  <!-- Include footer fin -->
<script type="text/javascript" src="role.js"></script>
<!-- ./wrapper -->

<script type="text/javascript">
    function modifier(libelle,idElement){
    $("#libelle2").val(libelle);
    $("#modifier").val(idElement);
  }
  

</script>
