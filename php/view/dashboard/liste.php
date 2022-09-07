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
  <title>HelpDesk | Dashboard</title>

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      <!-- Main Début  -->
      <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Tableau de bord</h1>
                </div>
                
            </div>
        </div>
      </div>

  <!-- Main content -->
      <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                  <?php 
                                        require_once('../../../php/classe/classeTicket.php');
                                        $Ticket = new Ticket();
                                        $list = $Ticket->listTicketOuvert();
                                        $nombre = count($list);
                                        echo "<h3>$nombre</h3>";                         
                                  ?> 
                                             
                                  <p>TICKETS OUVERTS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-alert"></i>
                                    <!-- <img src="probleme.png"  width="50" height="50"> -->
                                </div>
                                <a href="#" class="small-box-footer">Plus d'info<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                  <?php 
                                      require_once('../../../php/classe/classeTicket.php');
                                      $Ticket = new Ticket();
                                      $list = $Ticket->listTicketFerme();
                                      $nombre = count($list);
                                      echo "<h3>$nombre</h3>";                         
                                  ?> 
                                    <p>TICKETS FERMÉS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-checkbox-outline"></i>
                                  
                                </div>
                                <a href="#" class="small-box-footer">Plus d'info<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                <?php 
                                      require_once('../../../php/classe/classeUtilisateur.php');
                                      $Utilisateur = new Utilisateur();
                                      $list = $Utilisateur->listUtilisateur();
                                      $nombre = count($list);
                                      echo "<h3>$nombre</h3>";                         
                                  ?> 
                                    <p>UTILISATEURS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="../utilisateur/liste.php" class="small-box-footer">Plus d'info<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                <?php 
                                      require_once('../../../php/classe/classeUtilisateur.php');
                                      $Utilisateur = new Utilisateur();
                                      $list = $Utilisateur->listAgent();
                                      $nombre = count($list);
                                      echo "<h3>$nombre</h3>";                         
                                  ?> 
                                    <p>AGENTS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-settings"></i>
                                </div>
                                <a href="../agent/liste.php" class="small-box-footer">Plus d'info<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Metrics</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <!-- <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      
                    </tr>
                  </thead> -->
                  <tbody>
                    <tr>
                      <td><b>Top Severity Counts</b></td>
                      <td><ul style="list-style-type:none;">
                        <li><a href="#">7 No work around</a></li>
                        <li><a href="#">6 Work around exists</a></li>
                        <li><a href="#">2 Production Down System</a></li>
                      </ul></td>                  
                    </tr>
                    <tr>
                      <td><b>Top Urgency Count</b></td>
                      <td><ul style="list-style-type:none;">
                        <li><a href="#">6 Hautes</a></li>
                        <li><a href="#">5 Basses</a></li>
                        <li><a href="#">4 Moyennes</a></li>
                      </ul></td>                   
                    </tr>
                    <tr>
                      <td><b>Top Status Codes</b></td>
                      <td><ul style="list-style-type:none;">
                        <li><a href="#">13 Ouverts</a></li>
                        <li><a href="#">8 Fermés</a></li>  
                      </ul></td>        
                    </tr>
                    <tr>
                      <td><b>Top Products</b></td>
                      <td><ul style="list-style-type:none;">
                        <li><a href="#">11 Alpha Analytics Accelerator</a></li>
                        <li><a href="#">3 Sanity Testing Services Inc</a></li>
                        <li><a href="#">1 Butler Bussiness Barcodes</a></li>
                      </ul></td>                   
                    </tr>
      

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tickets ouverts par agent</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Nom complet</th>
                      <th> </th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John Doe</td>
                      <td><a href="#">13 Ouverts</a></td>
                    </tr>
                    <tr>
                      <td>John Doe</td>
                      <td><a href="#">13 Ouverts</a></td>
                    </tr>
                    <tr>
                      <td>Jason Faye</td>
                      <td><a href="#">4 Ouverts</a></td>
                    </tr> <tr>
                      <td>James Bond</td>
                      <td><a href="#">4 Ouverts</a></td>
                    </tr>
             
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
                </div>
      </section>
      <!-- /.content -->
      <!-- Main Fin -->

  </div>



   <!-- Include footer début -->
   <?php
    include('../../../footer.php');
  ?>
  <!-- Include footer fin -->

<!-- ./wrapper -->































 







































































