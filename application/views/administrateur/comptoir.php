 <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Liste des comptoirs
    <div class="pull-right action-buttons">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" style = "font-size: large; margin-top: 10px;">
                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
            </button>
            <ul class="dropdown-menu slidedown">
                <li><a id="ajouter-comptoir"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="panel-body">
    <ul class="list-group">
        <?php $nbcpt = 0; $nbli = 1;
            if(empty($comptoirs)) { ?>
            <div class="alert alert-info" id = "exp-non-dispo">
                Aucune actualité disponible pour le moment
            </div>
        <?php } else { 
                $nbcpt = count($comptoirs);
                $nbli = ceil($nbcpt/25);
             foreach($comptoirs as $i => $comptoir) { ?>
                <li class="list-group-item" libelle = "<?php echo $comptoir -> cptr_libelle; ?>" id = "comptoir-<?php echo $comptoir -> cptr_id ?>" <?php if($i >= 25) echo 'style = "display:none;"' ?> >
                    <div class="checkbox">
                        <!--<input type="checkbox" id="checkbox" />-->
                        <label for="checkbox">
                            <?php echo $comptoir -> cptr_libelle; ?>
                        </label>
                    </div>
                    <div class="pull-right action-buttons">
                        <a href="#" class="edit edit-comptoir" title="Editer"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" class="delete delete-comptoir" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>

    </ul>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-md-6">
            <h6>Total <span class="label label-info" id = "total-element"><?php echo $nbcpt; ?></span>
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
<div class = "modal modal-fade" role="dialog" id = "modal-gerercomptoir">
    <div class="modal-dialog">
     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-savecomptoir">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-comptoir" value = "" />
        <div class="row row-fluid">
            <div class = "form-group margin-top-thirty" style="margin-bottom: 30px">
                <label  class = "col-sm-3" for = "input-lib-comptoir">Libellé</label>
                <input class = "col-sm-9" id = "input-lib-comptoir" name = "input-lib-comptoir" placeholder="Libellé du comptoir"/>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-comptoir">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>px;