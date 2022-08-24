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
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
                  <!-- Dropdown Menu -->
                  <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <!-- <button><i class="far fa-user"> Serigne Saliou Dione</i></button> -->
                      <button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-user"></i> Serigne Saliou Dione</button>
                      
                      <!-- <span class="badge badge-danger navbar-badge">3</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                          <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                          <div class="media-body">
                            <h3 class="dropdown-item-title">
                              Nora Silvester
                              <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                        </div>
                        <!-- Message End -->
                      </a>
      
      
      
                      <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                          <div class="media-body">
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-lock"></i>  Fermer la session</button>       
                          </div>
                        </div>
                        <!-- Message End -->
                      </a>
                   
                    </div>
                  </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Include menu début -->
  <?php
    include('../../../menu.php');
  ?>
  <!-- Include menu fin -->




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
                                <label for="email" class="col-form-label">Email</label>
                                <input required type="email" class="form-control" id="email" name="email">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label>Role</label>
                                <select required="" class="form-control select2" style="width: 100%;">
                                  <!-- <option selected="selected">Alabama</option> -->
                                  <option value="" selected disabled>-Choisir-</option>
                                  <?php
                                    // require_once('php/classe/classeSalarie.php');
                                    // $Salarie = new Salarie();
                                    // $list = $Salarie->listSalarie();
                                    // foreach($list as $value3){
                                    ?>
                                      <option value="<?php //echo $value3['idSalarie']; ?>"><?php //echo $value3['matricule']." | ".$value3['nomComplet']; ?></option>
                                    <?php// }
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
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="cmotDePasse" class="col-form-label">Confirmer mot de passe</label>
                                <input type="password" class="form-control" id="cmotDePasse" name="cmotDePasse">
                              </div>
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="button" type="submit" class="btn btn-primary">Créer</button>
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
                <h3 class="card-title">Gestion des utilisateurs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td>Mbaye</td>
                    <td>Fallou</td>
                    <td>fallou_mbaye</td>
                    <td>fallou@gmail.com</td> 
                    <td class="project-state">
                            <span class="badge badge-success">Actif</span>
                    </td>   
                    <!-- <td>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input" id="customSwitch3">
                          <label class="custom-control-label" for="customSwitch3"></label>
                        </div>
                      </div>
                    </td>     
                              -->
                    <td>02-08-2022 </td>
                    <td>02-08-2022 </td>
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
                    <td>Fall</td>
                    <td>Abdou</td>
                    <td>abdou_fall</td>
                    <td>abdou@gmail.com</td>
                    <td class="project-state">
                            <span class="badge badge-danger">Inactif</span>
                    </td> 
                    <td>18-08-2022 </td>
                    <td>18-08-2022 </td>
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
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
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

<!-- ./wrapper -->