 <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Liste des actualités
    <div class="pull-right action-buttons">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" style = "font-size: large; margin-top: 10px;">
                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
            </button>
            <ul class="dropdown-menu slidedown">
                <li><a id="ajouter-actu"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></li>
                <!--<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>-->
            </ul>
        </div>
    </div>
</div>
<div class="panel-body">
    <ul class="list-group">
        <?php $nbacts = 0; $nbli = 1;
            if(empty($actualites)) { ?>
            <div class="alert alert-info" id = "exp-non-dispo">
                Aucune actualité disponible pour le moment
            </div>
        <?php } else { 
                $nbacts = count($actualites);
                $nbli = ceil($nbacts/25);
             foreach($actualites as $i => $act) { ?>
                <li class="list-group-item" id = "actu-<?php echo $act -> aact_id ?>" <?php if($i >= 25) echo 'style = "display:none;"' ?> >
                    <div class="checkbox">
                        <!--<input type="checkbox" id="checkbox" />-->
                        <label for="checkbox">
                            <?php echo $act -> aact_titre.' ( ajouté le '.$act -> aact_dateajout.' , modifié le '.$act -> aact_datemodification.')' ; ?>
                        </label>
                    </div>
                    <div class="pull-right action-buttons">
                        <a href="#" class="edit edit-actu" title="Editer"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" class="delete delete-actu" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>

    </ul>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-md-6">
            <h6>Total <span class="label label-info" id = "total-element"><?php echo $nbacts; ?></span>
                   Afficher 
                <select id = "nombre-affichage">
                    <option value = "10">10</option>
                    <option value = "25" selected>25</option>
                    <option value = "50">50</option>
                </select>
            </h6>

        </div>
        <div class="col-md-6">
            <ul class="pagination pagination-sm pull-right">
                <li class="disabled"><a id = "a-backward">«</a></li>
                <?php for($i =0; $i < $nbli; $i++) { ?>
                    <li <?php if($i == 0) echo 'class="active"' ?>><a ><?php echo $i + 1; ?></a></li>
                <?php } ?>
                <li <?php if($nbli == 1) echo 'class="disabled"' ?>><a id="a-forward">»</a></li>
            </ul>
        </div>
    </div>
</div>
<!--Modal-->
<div id="modal-gereractualite" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
      <?php $now = new DateTime() ?>
     <!--Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-saveactu">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-actualite" value = "" />
        <div id = "info-actu" class="row row-fluid">
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-titre-actu">Titre</label>
                <input  class = "col-sm-9" id = "input-titre-actu" name = "input-titre-actu" />
            </div>
            <div class = "form-group margin-top-five input-append date" style="padding-top: 30px;" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                <label  class = "col-sm-3" for = "input-date-actu">Date</label>
                <input class = "span2" id = "input-date-actu" name = "input-titre-actu" placeholder="Date de modification (j-m-a)" value="<?php echo $now -> format('d-m-Y') ?>"/>
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
        </div>
        <div id = "article-actu">
            <h5 id = "titre-article-actu">Articles</h5>
            <i class = "glyphicon glyphicon-plus-sign" id = "add-article-actu" title = "Ajouter un article"></i>
            <div id = "data-article" >
                <div class = "article row row-fluid">
                    <div class = "col-sm-11">
                        <div class = "form-group row">
                            <label class = "col-sm-3">Titre</label>
                            <input class = "input-titre-article col-sm-9" name = "input-titre-article" />
                        </div>
                        <div class = "form-group row margin-top-five">
                            <label class = "col-sm-3" >Contenu</label>
                            <textarea class = "input-contenu-article col-sm-9" name = "input-contenu-article" placeholder="Contenu de l'article" ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <i class = "glyphicon glyphicon-remove-sign delete-article" title = "Supprimer article"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-actualite">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>