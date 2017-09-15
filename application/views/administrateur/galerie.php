 <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Liste des actualités
    <div class="pull-right action-buttons">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" style = "font-size: large; margin-top: 10px;">
                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
            </button>
            <ul class="dropdown-menu slidedown">
                <li><a id="ajouter-galerie"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="panel-body">
    <ul class="list-group">
        <?php $nbgals = 0; $nbli = 1;
            if(empty($galeries)) { ?>
            <div class="alert alert-info" id = "exp-non-dispo">
                Aucune actualité disponible pour le moment
            </div>
        <?php } else { 
                $nbgals = count($galeries);
                $nbli = ceil($nbgals/25);
             foreach($galeries as $i => $galerie) { ?>
                <li class="list-group-item" repertoire = "<?php echo $galerie -> gal_repertoire; ?>" libelle = "<?php echo $galerie -> gal_libelle; ?>" imagemenu = "<?php echo $galerie -> gal_imagemenu; ?>" id = "galerie-<?php echo $galerie -> gal_id ?>" <?php if($i >= 25) echo 'style = "display:none;"' ?> >
                    <div class="checkbox">
                        <!--<input type="checkbox" id="checkbox" />-->
                        <label for="checkbox">
                            <?php echo $galerie -> gal_libelle; ?>
                        </label>
                    </div>
                    <div class="pull-right action-buttons">
                        <a href="#" class="edit edit-galerie" title="Editer"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" class="delete delete-galerie" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>

    </ul>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-md-6">
            <h6>Total <span class="label label-info" id = "total-element"><?php echo $nbgals; ?></span>
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
<div class = "modal modal-fade" role="dialog" id = "modal-gerergalerie">
    <div class="modal-dialog">
     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-savegalerie">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-galerie" value = "" />
        <div class="row row-fluid">
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-dir-galerie">Répertoire</label>
                <select  class = "col-sm-9" id = "input-dir-galerie" name = "input-dir-galerie">
                    <?php global $nom_rep;
                        foreach($repertoires as $rep) {
                            $nom_rep = basename($rep);
                            $gal = array_filter($galeries, function($gal) {
                                global $nom_rep;
                                return $nom_rep == $gal -> gal_repertoire;
                            });
                            if(empty($gal)) { ?>
                                <option value="<?php echo $nom_rep ?>">
                                    <?php echo $nom_rep ?>
                                </option>
                            <?php }
                        } ?>
                </select>
            </div>
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-3" for = "input-lib-galerie">Libellé</label>
                <input class = "col-sm-9" id = "input-lib-galerie" name = "input-lib-galerie" placeholder="Libellé de la galerie"/>
            </div>
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-3" for = "input-img-galerie">Image</label>
                <input class = "col-sm-9" id = "input-img-galerie" name = "input-img-galerie" placeholder="Image représentant la galerie"/>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-galerie">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>