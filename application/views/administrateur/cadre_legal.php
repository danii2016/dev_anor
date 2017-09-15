<div class="header">
    
    <div class = "alert alert-warning" id = "warning-cadre" style="display:none">Attention à ceci</div>
    <div class = "alert alert-danger" id = "error-cadre" style="display:none">Erreur de cela</div>
    <div class = "pull-right" id = "bouton-fichier" style="display: none">
        <label class="btn btn-primary" for = "file-1"><i class="glyphicon glyphicon-upload"></i> Ajouter fichier...</label>
        <input name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple="" type="file">
    </div>
    <h3 class="title header">Cadre légale<span id = "folder-selected"></span> <span id = "back-to-top" title="Retour aux dossiers principaux" class = "glyphicon glyphicon-arrow-up" style="color: #2583a8; cursor: pointer; display: none;"></span></h3>
</div>
<div class="cadre-legal-container">
    <div id="folder-container">
      <?php foreach($rubriques as $rub) { ?>
          <div class = "cadre-folder" id = "rubrique-<?php echo $rub -> crub_id ?>"  repertoire = "<?php echo $rub -> crub_repertoire ?>">
              <i class="glyphicon glyphicon-folder-close"></i><br/>
            <span class="libelle"><?php echo $rub -> crub_libelle ?></span>
          </div>
        <?php } ?>
    </div>
    <div id ="pdf-container" style="display: none;">
        
    </div>
</div>