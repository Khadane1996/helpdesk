<script type="text/javascript" src="php/view/tableau_bord/tableau_bord.js"></script>
<div class="" style="padding: 10px;">
  <div class="row" style="background-color: white; padding: 30px;">
    <div class="section">
      <h4 class="header">D&eacute;tails Sc&eacute;nario</h4>

      <?php
        require_once('php/classe/classetableau_bord.php');
        $tableau_bord = new tableau_bord();
        $list = $tableau_bord->recherchetableau_bord($opt[1]);
        foreach($list as $value){
      ?>
        <div class="">
          <div class="row">
            <div class="col s12 m3 l3">
              <blockquote class="z-depth-1">
                <strong>Libell&eacute;</strong>
                <br>
                <span style="font-weight: lighter;"><?php echo $value['libelle']; ?></span>
              </blockquote>
            </div>
            <div class="col s12 m9 l9">
              <blockquote class="z-depth-1">
                <strong>Description</strong>
                <br>
                <span style="font-weight: lighter;"><?php echo $value['description']; ?></span>
              </blockquote>
            </div>
          </div>
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
                  <?php
                    require_once('php/classe/classeDetailtableau_bord.php');
                    $Detailtableau_bord= new Detailtableau_bord();
                    $idtableau_bord = $value['idtableau_bord'];
                    $listDetailtableau_bord = $Detailtableau_bord->listDetailtableau_bord($idtableau_bord);

                    foreach($listDetailtableau_bord as $valueDetailtableau_bord){
                  ?>
                    <tr>
                      <td><?php echo $valueDetailtableau_bord['libelle']; ?></td>
                      <td><?php echo $valueDetailtableau_bord['delai']; ?> (jour(s))</td>
                      <td><?php echo $valueDetailtableau_bord['perteProbable']; ?> %</td>
                      <td><?php echo $valueDetailtableau_bord['typeenvoi']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php } ?>
      
    </div>
  </div>
</div>
