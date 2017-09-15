<div class="header">
    <a class="btn btn-primary pull-right" id = "add-procedure"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
    <h3 class="title header">Liste des preocédures</h3>
</div>
<div class="table-container">
    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Rubrique</th>
        <th>Langage</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($procedures as $proc) { ?>
          <tr class = "ligne-process" id = "proc-<?php echo $proc -> pcont_id ?>-<?php echo $proc -> pproc_id ?>" langage = "<?php echo $proc -> pcont_lang ?>"  contenu = "<?php echo $proc -> pcont_contenu ?>">
            <td><?php echo $proc -> pcont_id ?></td>
            <td><?php echo $proc -> pproc_libelle ?></td>
            <td><?php echo $proc -> pcont_lang == "fr" ? "Français" : "Malagasy" ?></td>
            <td class = "action-td">
              <a class = "edit edit-procedure" title = "Modifier la procédure"><i class = "glyphicon glyphicon-pencil"></i></a> 
              <a class = "delete delete-procedure" title = "Supprimer la procédure"><i class = "glyphicon glyphicon-remove"></i></a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<!--Modal d'édition -->
<div class = "modal modal-fade" role="dialog" id = "modal-gererprocedure">
    <div class="modal-dialog modal-lg">
     <!--Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-saveprocedure">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-procedure" value = "" />
        <div class="row row-fluid">
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-lang-proc">Langage</label>
                <select  class = "col-sm-9" id = "input-lang-proc" name = "input-lang-proc">
                    <option value="mg">Malagasy</option>
                    <option value="fr">Français</option>
                </select>
            </div>            
            <div class = "form-group">
                <label class = "col-sm-3" for = "input-rub-proc">Rubrique</label>
                <select  class = "col-sm-9" id = "input-rub-proc" name = "input-rub-proc">
                    <?php foreach($rubriques as $rub) {  ?>
                        <option value="<?php echo $rub -> pproc_id ?>">
                            <?php echo $rub -> pproc_libelle ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class = "form-group margin-top-thirty">
                <label  class = "col-sm-12" for = "input-cont-proc">Contenu</label>
                <textarea class = "t" id = "input-cont-proc" name = "input-cont-proc" placeholder="Libellé de la galerie">
                </textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-procedure">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
