<div class="header">
    <a class="btn btn-primary pull-right" id = "add-administrateur"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
    <h3 class="title header">Liste des administrateurs</h3>
</div>
<div class="table-container">
    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Civilité</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Titre</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($administrateurs as $adm) { ?>
          <tr class = "ligne-process" id = "adm-<?php echo $adm -> admin_id ?>-<?php echo $adm -> admin_role ?>" >
            <td class = "id-adm"><?php echo $adm -> admin_id ?></td>
            <td class = "civilite-adm"><?php echo $adm -> admin_civilite ?></td>
            <td class = "nom-adm"><?php echo $adm -> admin_nom ?></td>
            <td class = "prenom-adm"><?php echo $adm -> admin_prenom ?></td>
            <td class = "titre-adm"><?php echo $adm -> radm_libcourt ?></td>
            <td class = "action-td">
              <a class = "edit edit-administrateur" title = "Modifier la personne"><i class = "glyphicon glyphicon-pencil"></i></a> 
              <a class = "delete delete-administrateur" title = "Supprimer la personne"><i class = "glyphicon glyphicon-remove"></i></a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<!--Modal d'édition -->
<div class = "modal modal-fade" role="dialog" id = "modal-gereradmin">
    <div class="modal-dialog">
     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-saveprocedure">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-adm" value = "" />
        <div class="row row-fluid">      
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-adm-titre">Titre</label>
                <select  class = "col-sm-9" id = "input-adm-titre" name = "input-adm-titre">
                    <?php foreach($roles as $role) {  ?>
                        <option value="<?php echo $role -> radm_id ?>">
                            <?php echo $role -> radm_role ?>
                        </option>
                    <?php } ?>
                </select>
            </div>      
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-adm-civ">Civilité</label>
                <select  class = "col-sm-9" id = "input-adm-civ" name = "input-adm-civ">
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="Mademoiselle">Mademoiselle</option>
                </select>
            </div>
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-3" for = "input-adm-nom">Nom</label>
                <input class = "col-sm-9" id = "input-adm-nom" name = "input-adm-nom" placeholder="Nom Administrateur" />
            </div>
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-3" for = "input-adm-prenom">Prénom</label>
                <input class = "col-sm-9" id = "input-adm-prenom" name = "input-adm-prenom" placeholder="Prénom Administrateur" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-admin">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
