<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpDesk | Inscription</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Help</b>Desk</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">INSCRIPTION</p>

      <form  id="monFormIns">
        <div class="input-group mb-3">
          <input type="text" class="form-control"  id="prenom" name="prenom" placeholder="Prénom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  id="nom" name="nom" placeholder="Nom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  id="login" name="login" placeholder="Login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>      
             
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="motDePasse2" name="motDePasse2" placeholder="Retaper mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3" id="idRole" name="idRole" value="3">
                          <!-- <div class="form-group">
                           
                            <select class="form-control" id="" name="idRole">           
                              <option value="1"> Admininstrateur</option>
                              <option value="2"> Technicien </option>
                              <option value="3" selected> Utilisateur Simple </option>
                            </select>
                          </div> -->
        </div> 
        <input type="hidden" name="adresse" id="adresse" value="1">
        <input type="hidden" name="telephone" id="telephone" value="1">  
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12 ">
            <input type="hidden" name="ajouter">
            <button type="submit" class="btn btn-primary btn-block "  name="action" >S'INSCRIRE</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="index.php" class="text-right">j'ai déjà un compte</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="../../../php/view/utilisateur/utilisateur.js"></script>
</body>
</html>
