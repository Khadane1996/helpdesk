<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter priorité</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="monForm">
              
              <div class="row">
                <div class="col-12 col-sm-12"> <!-- col s12 m3 l3  -->
                  <div class="form-group">
                    <label for="libelle" class="col-form-label">Libelle</label>
                    <input required type="text" class="form-control" id="libelle" name="libelle">
                  </div>
                </div>
                
              </div>
              <input type="hidden" name="ajouter">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="action">Créer</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>