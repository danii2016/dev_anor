<input type="hidden" id = "repertoire_courant" value = "<?php  echo $repertoire ?>" />
<?php if(empty($fichiers)) { ?>
    <div class="alert alert-info" id = "exp-non-dispo">
        Aucun fichier disponible pour le moment
    </div>
  <?php  } else {
    foreach($fichiers as $i => $fic) { ?>
    <div class="col-md-4 image-stat-content">
        <i class = "glyphicon glyphicon-remove-sign delete-image-stat" title="Supprimer l'image"></i>
        <img class="image-statistique" src = "<?php echo base_url('assets/documents/statistiques/'.$repertoire.'/'.$fic) ?>">
    </div>
<?php } 
} ?>