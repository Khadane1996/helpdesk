<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="container" style="background-color: white; padding: 30px; margin-top: 10px;">
  <div class="loader loaderMessage loader-bar" data-text="Envoi des donn&eacute;es en cours. Veuillez patienter" data-rounded></div>
  <div id="mail-app" class="section">
    <div class="row">
      <div class="col s12 m12 l12">
        <h4 class="header2">Modifier utilisateur</h4> <br>
        <div class="row">
          <?php
            require_once('php/classe/classeUtilisateur.php');
            $Utilisateur = new Utilisateur();
            $list = $Utilisateur->rechercheUtilisateur($opt[1]);
            foreach($list as $value){
          ?>
            <form class="col s12" id="monFormMod">
              <div class="row">
               
                <div class="input-field col s12 m3 l3">
                  <input value="<?php echo $value['nomComplet'] ?>" id="nom" name="nom" type="text" required>
                  <label for="nom">Nom</label>
                </div>
                <div class="input-field col s12 m3 l3">
                  <input value="<?php echo $value['email'] ?>" id="email" name="email" type="email" required>
                  <label for="email">E-mail</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 m3 l3">
                  <input id="telephone" name="telephone" type="text">
                  <label for="telephone">T&eacute;l&eacute;phone</label>
                </div>
                <div class="input-field col s12 m3 l3">
                  <input value="<?php echo $value['login'] ?>" id="login" name="login" type="text" required>
                  <label for="login">Login</label>
                </div>
                <div class="input-field col s12 m3 l3">
                  <input value="<?php echo $value['motDePasse'] ?>" id="motDePasse" name="motDePasse" type="password" required>
                  <label for="motDePasse">Mot de passe</label>
                </div>
                <div class="input-field col s12 m3 l3">
                  <input value="<?php echo $value['motDePasse'] ?>" id="motDePasse2" name="motDePasse2" type="password" required>
                  <label for="motDePasse2">Confirmer mot de passe</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m3 l3">
                  <div class="input-field">
                    <select id="idRole" name="idRole" class="select2 browser-default" required>
                      <?php
                        require_once('php/classe/classeUtilisateur.php');
                        $Utilisateur = new Utilisateur();
                        $list2 = $Utilisateur->listRole();
                        foreach($list2 as $value2){
                      ?>
                        <option <?php if($value['idRole'] == $value2['idRole']) echo "selected" ?> value="<?php echo $value2['idRole']; ?>"><?php echo $value2['libelle']; ?></option>  
                      <?php  }
                      ?>
                    </select>
                    <label>Choisir un r&ocirc;le</label>
                  </div>
                </div>

                <div class="col s12 m3 l3">
                  <div class="input-field">
                    <select id="idEquipe" name="idEquipe" class="select2 browser-default" required>
                      <?php
                        require_once('php/classe/classeEquipe.php');
                        $Equipe = new Equipe();
                        $list2 = $Equipe->listEquipe();
                        foreach($list2 as $value2){
                      ?>
                        <option <?php if($value['idEquipe'] == $value2['idEquipe']) echo "selected" ?> value="<?php echo $value2['idEquipe']; ?>"><?php echo $value2['libelle']; ?></option>  
                      <?php  }
                      ?>
                    </select>
                    <label>Choisir une &eacute;quipe</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input value="<?php echo $value['idUtilisateur'] ?>" type="hidden" name="modifier">
                  <button class="btn green waves-effect waves-light right" type="submit" name="action">Valider</button>
                  <a class="btn mr-1 red waves-effect waves-light right" href="utilisateur_liste">Annuler
                  </a>
                </div>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>