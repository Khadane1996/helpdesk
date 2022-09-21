<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../../dist/img/H1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HelpDesk</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="margin-left: auto; margin-right: auto;width: 6em">
          <a href="#" class="d-block">Menu</a>
        </div>
      </div>
      <?php 
        $lien = explode('/helpdesk/php/view/',$_SERVER['REQUEST_URI']);
        $lien = explode('/',$lien[1]);
        // echo $lien[0];
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../../../php/view/dashboard/liste" class="nav-link <?php if($lien[0] == 'dashboard') echo 'active'; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <?php

          if(isset($_SESSION['helpdeskadministrateur'])){

          ?>
          <li class="nav-item">
            <a href="../../../php/view/utilisateur/liste" class="nav-link <?php if($lien[0] == 'utilisateur') echo 'active'; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Utilisateurs
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../php/view/role/liste" class="nav-link <?php if($lien[0] == 'role') echo 'active'; ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Role
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="../../../php/view/ticket/liste" class="nav-link <?php if($lien[0] == 'ticket') echo 'active'; ?>">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Tickets
                <!-- <span class="right badge badge-primary">6</span> -->
              </p>
            </a>
          </li>

          <?php

          if(isset($_SESSION['helpdeskadministrateur'])){

          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Paramètres
                <!-- <span class="right badge badge-danger">New</span> -->
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <?php 
                    if(isset($_SESSION['helpdeskadministrateur'])){
                  ?>
                  <!-- Mettre ici les menu que l'administrateur peut voir -->
                  <?php 
                    }
                  ?>
                  <?php 
                    if(isset($_SESSION['helpdesktechnicien'])){
                  ?>
                  <!-- Mettre ici les menu que le technicien peut voir... -->
                  <?php 
                    }
                  ?>

                  <?php 
                    if(isset($_SESSION['helpdesksimple'])){
                  ?>
                  <!-- Mettre ici les menu que l'utilisateur peut voir ... -->
                  <?php 
                    }
                  ?>
                  

                    <a href="../../../php/view/agent/liste" class="nav-link <?php if($lien[0] == 'agent') echo 'active'; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Agent</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../../php/view/categorie/liste" class="nav-link <?php if($lien[0] == 'categorie') echo 'active'; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Catégorie</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../../php/view/priorite/liste" class="nav-link <?php if($lien[0] == 'priorite') echo 'active'; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Priorité</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../../php/view/status/liste" class="nav-link <?php if($lien[0] == 'status') echo 'active'; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Status</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link <?php if($lien[0] == 'localite') echo 'active'; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Localité</p>
                    </a>
                  </li>
                </ul>
          </li>
           <?php } ?>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>