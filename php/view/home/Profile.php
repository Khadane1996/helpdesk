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
  <title>HelpDesk | Profile</title>

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

  <style>
      .centrer-profil {
        width: auto;
        margin: auto;
        
      }
      h1,h3{
        text-align: right;
        /* color: #4287f5; */
      }
    </style>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div  class="centrer-profil col-6">
            
                      <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../../docs/assets/img/avatar-7.png"
                       alt="User profile picture">
                </div>

                <h1 class="profile-username text-center"><?php echo $_SESSION['helpdeskprenom'] . " " . $_SESSION['helpdesknom'] ?></h1>

                <!-- <p class="text-muted text-center">Software Engineer</p> -->
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Login</b> :  <?php echo $_SESSION['helpdesklogin']?>
                  </li>
                  <li class="list-group-item">
                    <b>Adresse email</b> :  <?php echo $_SESSION['helpdeskemail'] ?>
                  </li>
                  <li class="list-group-item">
                    <b>T&eacute;l&eacute;phone</b> :  <?php echo $_SESSION['helpdesktelephone']?>
                  </li>
                  <li class="list-group-item">
                    <b>Mot de passe</b> :  ****************
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Modifier</b></a>
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
<script type="text/javascript" src="status.js"></script>
<!-- ./wrapper -->

<script type="text/javascript">

  function modifier(libelle,idElement){
    
    $("#modifier").val(idElement);
  }

</script>
