<div class="header">
    <a class="btn btn-primary pull-right" id = "add-link"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
    <h3 class="title header">Liste des collaborateurs</h3>
</div>
<div class="table-container">
    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>url</th>
        <th>logo</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($liens as $lien) { ?>
          <tr class = "ligne-collaborateur" id = "lien-<?php echo $lien -> colb_id ?>" logo = "<?php echo $lien -> colb_logo ?>">
            <td class = "id-colab"><?php echo $lien -> colb_id ?></td>
            <td class = "nom-colab"><?php echo $lien -> colb_nom ?></td>
            <td class = "url-colab"><?php echo $lien -> colb_url ?></td>
            <td class = "logo-colab"><?php if($lien -> colb_logo != "") { ?><img src = "<?php echo base_url('assets/image/logos_collab/'.$lien -> colb_logo) ?>" /><?php } ?></td>
            <td class = "action-td">
              <a class = "edit edit-link" title = "Modifier la procédure"><i class = "glyphicon glyphicon-pencil"></i></a> 
              <a class = "delete delete-link" title = "Supprimer la procédure"><i class = "glyphicon glyphicon-remove"></i></a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<!--Modal d'édition -->
<div class = "modal modal-fade" role="dialog" id = "modal-gererlien">
    <div class="modal-dialog modal-lg">
     <!--Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-savelink">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-colab" value = "" />
        <div class="row row-fluid">
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-nom-colab">Nom</label>
                <input  class = "col-sm-9" id = "input-nom-colab" name = "input-nom-colab" placeholder = "Nom collaborateur"/>
            </div>            
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-url-colab">Url</label>
                <input  class = "col-sm-9" id = "input-url-colab" name = "input-nom-colab" placeholder = "www.test.com"/>
            </div> 
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-3">Logo image</label><label  class = "btn btn-primary col-sm-9" for = "file-logo"><i class="glyphicon glyphicon-upload"></i> Modifier logo...</label>
                <input name="file-1[]" id="file-logo" class="inputfile inputfile-1"  type="file">
                <img id = "logo-collaborateur" src = "<?php echo base_url('assets/image/logos_collab/image_logo_default.png') ?>" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-colab">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
