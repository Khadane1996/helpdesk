<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="monForm">
                         
                          <div class="row">
                            <div class="col-6 col-sm-6"> <!-- col s12 m3 l3  -->
                              <div class="form-group">
                                <label for="prenom" class="col-form-label">Prénom</label>
                                <input required type="text" class="form-control" id="prenom" name="prenom">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="nom" class="col-form-label">Nom</label>
                                <input required type="text" class="form-control" id="nom" name="nom">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input required type="email" class="form-control" id="email" name="email">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label>Role</label>
                                <select required="" class="form-control select2" style="width: 100%;">
                                  <!-- <option selected="selected">Alabama</option> -->
                                  <option value="" selected disabled>-Choisir-</option>
                                  <?php
                                    // require_once('php/classe/classeUtilisateur.php');
                                    // $Role = new Role();
                                    // $list = $Role->listRole();
                                    // foreach($list as $value3){
                                    ?>
                                      <option value="<?php //echo $value3['idRole']; ?>"><?php //echo $value3['matricule']." | ".$value3['nomComplet']; ?></option>
                                    <?php// }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="login" class="col-form-label">Login</label>
                                <input type="text" class="form-control" id="login" name="login">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="motDePasse" class="col-form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="motDePasse" name="motDePasse">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6">
                              <div class="form-group">
                                <label for="cmotDePasse" class="col-form-label">Confirmer mot de passe</label>
                                <input type="password" class="form-control" id="cmotDePasse" name="cmotDePasse">
                              </div>
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="button" type="submit" class="btn btn-primary">Créer</button>
                          </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>