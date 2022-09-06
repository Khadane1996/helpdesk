<!--start container--><script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="container">
            <div class="loader loaderMessage loader-bar" data-text="Enr&eacute;gistrement des modifications en cours. Veuillez patienter" data-rounded></div>
            <div>
              <div class="row">
                <div class="col s12 m8 l6 offset-m2 offset-l3">
                  <h4 class="header center">Mon Profile</h4>
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/gallary/3.png" alt="user bg">
                    </div>
                    <div class="card-content">
                      <img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
                      <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                      </a>
                      <h5 class="card-title activator grey-text text-darken-4">
                        <span style="display: inline-block; position: relative; top: -5px;"> <?php echo $_SESSION['sirmelprenom']; ?> <?php echo $_SESSION['sirmelnom']; ?></span></h5>
                      <p>
                        <i class="material-icons">perm_identity</i> 
                        <span style="display: inline-block; position: relative; top: -5px;"><?php echo $_SESSION['sirmelprofile']; ?></span> 
                      </p>
                     
                      <br>
                      <br>
                      <br>
                      <br>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Modification de mot de passe
                          <i class="material-icons right">close</i>
                        </span>
                      <div class="row">
                        <form class="col s12" id="monFormUpdateProfile">
                          <div class="row">
                            <div class="input-field col s12 m12 l12">
                              <input required id="motDePasseActuel" name="motDePasseActuel" type="password">
                              <label for="motDePasseActuel">Mot de passe actuel</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12 m12 l12">
                              <input required id="motDePasse" name="motDePasse" type="password">
                              <label for="motDePasse">Nouveau Mot de passe</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                              <input required id="motDePasse2" name="motDePasse2" type="password">
                              <label for="motDePasse2">Confirmer nouveau mot de passe</label>
                            </div>
                          </div>
                          <div class="row">
                              <div class="input-field col s12">
                                <input type="hidden" name="updateProfile">
                                <input type="hidden" name="login" id="login" value="<?php echo $_SESSION['sirmellogin']; ?>">
                                <button class="btn green waves-effect waves-light right" type="submit" name="action">Valider
                                </button>
                                <a class="btn mr-1 card-title red waves-effect waves-light right" href="javascript:void(0);" style="font-size: 1rem;">Annuler
                                </a>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>