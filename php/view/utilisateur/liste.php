<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Tickets</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- <li><button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-plus"></i> ajouter</button></li> -->
            <li>
            <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo"><i class="fa fa-plus"></i> ajouter</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Catégorie</label>
                            <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" required>
                                <option selected="selected">-Choisir catégorie-</option>
                                <option>Logicielle</option>
                                <option>Matérielle</option>   
                            </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Priorité</label>
                            <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" required>
                                <option selected="selected">-Choisir priorité-</option>
                                <option>Haute</option>
                                <option>Moyenne</option>  
                                <option>Basse</option>  
                            </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <td><select class="form-control">
                        <option selected="selected"> -Choisir agent-</option>
                        <option> Agent 1</option>
                        <option> Agent 2</option>
                        <option> Agent 3</option>
                        </select></td>
                        <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Créer</button>
                    </div>
                </div>
                </div>
            </div>
            </li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Gestion des tickets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Content</th>
                <th>Auteur</th>
                <th>priorite</th>
                <th>Catégorie</th>
                <th>Status</th>
                <th>Assigné à</th>
                <th> </th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                    <td>Problème d'accès</td>
                    <td>Fatou Faye</td>
                    <td>Haute</td>
                    <td>Logicielle</td>
                    <td class="project-state">
                        <span class="badge badge-success">Ouvert</span>
                    </td>
                    <td> Agent 1 </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-eye">
                            </i>
                            Voir
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Modifier
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Supprimer
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>Problème de routeur</td>
                    <td>Mbery Dieng</td>
                    <td>Moyenne</td>
                    <td>Matérielle</td>
                    
                    <td class="project-state">
                        <span class="badge badge-danger">Fermé</span>
                    </td>
                    <td> Agent 2 </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-eye">
                            </i>
                            Voir
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Modifier
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Supprimer
                        </a>
                    </td>
                </tr>
                            
                </tbody>
                <tfoot>
                <tr>
                <th>Content</th>
                <th>Auteur</th>
                <th>priorite</th>
                <th>Catégorie</th>
                <th>Status</th>
                <th>Assigné à</th>
                <th> </th>
                </tr>
                </tfoot>
            </table>
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