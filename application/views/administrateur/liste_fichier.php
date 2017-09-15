<div class="panel-footer"><div class="panel-body">
    <ul class="list-group">
        <?php $nbfichiers = 0; $nbli = 1;
            if(empty($fichiers)) { ?>
            <div class="alert alert-info" id = "exp-non-dispo">
                Aucun fichier disponible pour le moment
            </div>
        <?php } else { 
                $nbfichiers = count($fichiers);
                $nbli = ceil($nbfichiers/25);
             foreach($fichiers as $i => $fic) { ?>
                <li class="list-group-item" id = "pdf-<?php echo $i ?>" <?php if($i >= 25) echo 'style = "display:none;"' ?> >
                    <div class="checkbox">
                        <!--<input type="checkbox" id="checkbox" />-->
                        <label for="checkbox">
                            <?php echo $fic ; ?>
                        </label>
                    </div>
                    <div class="pull-right action-buttons">
                        <a href="#" class="delete-cadre" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
<div class="panel-footer"><div class="panel-footer">
    <div class="row">
        <div class="col-md-6">
            <h6>Total <span class="label label-info" id = "total-element"><?php echo $nbfichiers; ?></span>
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