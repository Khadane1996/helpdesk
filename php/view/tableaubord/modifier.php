<script type="text/javascript" src="php/view/tableau_bord/tableau_bord.js"></script>
<div class="container" style="background-color: white; padding: 30px; margin-top: 10px;">
  <div class="loader loaderMessage loader-bar" data-text="Envoi des donn&eacute;es en cours. Veuillez patienter" data-rounded></div>
  <div id="mail-app" class="section">
    <div class="row">
      <div class="col s12 m12 l12">
        <h4 class="header2">Modification Sc&eacute;nario</h4> <br>
        <div class="row">
          <form class="col s12" id="monFormMod">

            <div class="row">
              <div class="input-field col s12 m12 l12">
                <input required id="libelle" name="libelle" type="text">
                <label for="libelle">Libell&eacute;</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12 form-control">
                <label for="description">Description</label>
                  <textarea id="description" name="description" class="materialize-textarea summernote" style="height: 90px;"></textarea>
              </div> 
            </div>
          </form>
        </div>
        <div class="row" id="detailsContainer">
          <div class="col s12 m12 l12">
            <div class="divider" style="margin-top: 20px;"></div>
            <div class="row">
              <div class="col s12 m12 l12">
                <p>&Eacute;tapes sc&eacute;nario</p>
              </div>

              <div class="col s12 m12 l12">
                <table class="striped responsive-table">
                  <thead>
                    <tr>
                      <th>Libell&eacute;</th>
                      <th>Delai</th>
                      <th>Perte probable</th>
                      <th>Type envoi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Libell&eacute; 1</td>
                      <td>0 (jour(s))</td>
                      <td>1 %</td>
                      <td>Aucun</td>
                    </tr>
                    <tr>
                      <td>Libell&eacute; 2</td>
                      <td>5 (jour(s))</td>
                      <td>0 %</td>
                      <td>Impression d'un courrier</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="divider" style="margin-top: 30px;"></div>
            <div class="row">
              <div class="col s12 m12 l12">
                <form class="col s12" id="monFormDetails">
                  <div class="row">
                    <div class="col m3 l3 s12">
                      <div class="input-field">
                        <input required id="libelle" name="libelle" type="text">
                        <label for="libelle">Libell&eacute;</label>
                      </div>
                    </div>
                    <div class="col m3 l3 s12">
                      <div class="input-field">
                        <input required id="delai" name="delai" type="number">
                        <label for="delai">D&eacute;lai (en jours)</label>
                      </div>
                    </div>
                    <div class="col m3 l3 s12">
                      <div class="input-field">
                        <input required id="perteProbable" name="perteProbable" type="number">
                        <label for="perteProbable">Perte probable (en %)</label>
                      </div>
                    </div>
                    <div class="col m13 l3 s12">
                      <div class="input-field">
                        <select class="select2 browser-default" name="idTypeenvoi" id="idTypeenvoi">
                          <?php
                              require_once('php/classe/classeTypeenvoi.php');
                              $Typeenvoi = new Typeenvoi();
                              $list = $Typeenvoi->listTypeenvoi();
                              foreach($list as $value){
                            ?>
                              <option value="<?php echo $value['idTypeenvoi']; ?>"><?php echo $value['libelle']; ?></option>  
                            <?php  }
                            ?>
                        </select>
                        <label>Type envoi</label>
                      </div>
                    </div> 
                  </div>
                    
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button class="btn green waves-effect waves-light right" type="submit" name="action">Ajouter</button>
                      <!-- <a class="btn mr-1 red waves-effect waves-light right" href="tableau_bord_liste">Annuler -->
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="divider" style="margin-top: 30px;"></div>
            <div class="row">
              <div class="input-field col s12">
                <button class="btn blue waves-effect waves-light right" type="button" name="action">Terminer</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$("#showHidden").on("click", function(){
  $("#detailsContainer").removeAttr("hidden");
});

//$("#destinataireChoix").show();

</script>