<!DOCTYPE html>
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
              <li>
                <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo"><i class="fa fa-plus"></i> ajouter</button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label>Catégorie</label>
                                <select required="" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="idRole" name="idRole">
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
                              <!-- /.form-group -->
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                <label>Priorité</label>
                                <select required="" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="idRole" name="idRole">
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
                              <!-- /.form-group -->
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Description</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                          <div class="form-group">
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                <label>Assigné à</label>
                                
                                <select required="" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="idRole" name="idRole">
                                    <option value="" selected disabled>-Choisir-</option>
                                      <?php 
                                          require_once('../../../php/classe/classeUtilisateur.php');
                                          $Utilisateur = new Utilisateur();
                                          $list = $Utilisateur->listAgent();
                                          foreach($list as $value){
                                      ?>
                                    <option value="<?php echo $value['idUtilisateur'] ?>"><?php echo $value['prenom'] .' '.$value['nom']  ?></option>
                                      <?php }
                                      ?>
                                </select>
                              </div>
                              <!-- /.form-group -->
                            </div>
                          </div>
                                     
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Créer</button>
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
                <h3 class="card-title">Gestion des tickets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Priorité</th>
                    <th>Catégorie</th>
                    <th>Status</th>
                    <th>Assigné à</th>
                    <!-- <th>Created</th>
                    <th>Updated</th> -->
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                      <td>Problème d'accès</td>
                      <td>Fatou Faye</td>
                      <td>Haute</td>
                      <td>Logicielle</td>
                      <td class="project-state">
                            <span class="badge badge-success">Ouvert</span>
                      </td>
                      <td> Agent 1 </td>
                      <!-- <td> 1 semaine </td>
                      <td> 1 semaine </td> -->
                      <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                Voir
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modifier
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Supprimer
                            </a>
                      </td>
                    </tr>

                    <tr>
                      <td>Problème de routeur</td>
                      <td>Mbery Dieng</td>
                      <td>Moyenne</td>
                      <td>Matérielle</td>
                      
                        <td class="project-state">
                            <span class="badge badge-danger">Fermé</span>
                        </td>
                        <td> Agent 2 </td>
                        <!-- <td> 2 semaines </td>
                        <td> 2 semaines </td> -->
                       <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                Voir
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modifier
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Supprimer
                            </a>
                        </td>
                    </tr>
                              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Priorité</th>
                    <th>Catégorie</th>
                    <th>Status</th>
                    <th>Assigné à</th>
                    <!-- <th>Created</th>
                    <th>Updated</th> -->
                    <th> </th>
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
  </div>
  <!-- /.content-wrapper -->







   <!-- Include footer début -->
   <?php
    include('../../../footer.php');
  ?>
  <!-- Include footer fin -->


