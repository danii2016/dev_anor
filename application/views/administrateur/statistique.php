<div class="header">
    
    <div class = "alert alert-warning" id = "warning-stat" style="display:none">Attention à ceci</div>
    <div class = "alert alert-danger" id = "error-stat" style="display:none">Erreur de cela</div>
    <a class = "pull-right btn btn-primary" id = "bouton-add-annee-stat" data-toggle = "modal" data-target = "#modal-gererannee"><i class="glyphicon glyphicon-plus"></i> Ajouter une année</a>
    <div class = "pull-right" id = "bouton-image-stat" style="display: none">
        <label class="btn btn-primary" for = "file-image"><i class="glyphicon glyphicon-upload"></i> Ajouter fichier...</label>
        <input name="file-image[]" id="file-image" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple="" type="file">
    </div>
    <h3 class="title header">Statistiques<span id = "folder-selected"></span> <span id = "back-to-top" title="Retour aux dossiers principaux" class = "glyphicon glyphicon-arrow-up" style="color: #2583a8; cursor: pointer; display: none;"></span></h3>
</div>
<div class="cadre-legal-container">
    <div id="folder-container">
      <?php foreach($statistiques as $stat) { ?>
          <div class = "stat-folder" id = "rubrique-<?php echo $stat -> stat_id ?>"  repertoire = "<?php echo $stat -> stat_repertoire ?>">
              <i class="glyphicon glyphicon-remove-sign delete-folder-stat" title = "Supprimer le dossier"></i>
              <i class="glyphicon glyphicon-folder-close"></i><br/>
            <span class="libelle" style="text-align:center; width:100%;"><?php echo $stat -> stat_annee ?></span>
          </div>
        <?php } ?>
    </div>
    <div id ="image-container" style="display: none;">
        
    </div>
</div>
<!--Modal-->
<div id="modal-gererannee" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <?php $now = new DateTime() ?>
     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter année statistique</h4>
        <div class="alert alert-danger" id = "error-saveannee">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-annee" value = "" />
        <div class = "form-group" style="margin-bottom: 20px;">
            <label class = "col-sm-3" for = "input-lib-annee">Année</label>
            <input  class = "col-sm-9" id = "input-lib-annee" name = "input-titre-actu" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-annee">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>