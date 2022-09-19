
<div class="wrapper">
  

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../../../dist/img/H1.png" alt="AdminLTELogo" height="60" width="60">
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
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> -->
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
                      <!-- <button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-user"></i><?php echo $_SESSION['helpdeskprenom'].' '.$_SESSION['helpdesknom']; ?></button> -->
                     <button type="button" class="btn btn-outline-primary btn-block btn-sm"><?php echo $_SESSION['helpdeskprenom'].' '.$_SESSION['helpdesknom']; ?></button>

                      <!-- <span class="badge badge-danger navbar-badge">3</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       
                      <!-- <div class="dropdown-divider"></div> -->
                      <a href="#" class="dropdown-item">
                        <!-- Profil Start -->
                        <div class="media">
                          <div class="media-body">
                            <button  onclick="location.href='#';" type="button" class="btn .btn-lg btn-block btn-sm" > <i class="fa fa-user-cog"></i>  Profil</button>     
                          </div>
                        </div>
                        <!-- Profil End -->
                      </a>
      
      
      
                      <a href="#" class="dropdown-item">
                        <!-- Déconnexion Start -->
                        <div class="media">
                          <div class="media-body">
                            <button  onclick="location.href='../../../deconnexion.php';" type="button" class="btn btn-outline-primary btn-block btn-sm" > <i class="fa fa-lock"></i>  Fermer la session</button>     
                          </div>
                        </div>
                        <!-- Déconnexion End -->
                      </a>
                   
                    </div>
                  </li>
    </ul>
  </nav>
  <!-- /.navbar -->