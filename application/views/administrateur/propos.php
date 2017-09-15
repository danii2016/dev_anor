 <div class="main-wrapper">
    <button type="button" class="btn btn-primary pull-right" id="save-propos" >
        <span class="glyphicon glyphicon-ok" style="margin-right: 0px;"></span> Enregistrer
    </button>
    <h3>Texte à propos</h3> 
    <div class = "alert alert-success">Enregistré avec succès</div> 
    <div class = "alert alert-danger">Une erreur s'est produite</div> 
    <div class="content-ui">
        <div class="form-group">
            <label for = "titre-organigram" class = "col-md-3">Titre organigramme</label> 
            <input  class = "col-md-9" type = "text" id="titre-organigram" value = "<?php echo $info -> ap_titreorganigramme ?>" />
        </div>
        <div class="form-group">
            <label for = "ppo-contenu" style = "padding-left: 15px;">Contenu</label> 
            <textarea id="ppo-contenu">
                <?php echo $info -> ap_contenu ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for = "" class = "col-md-3">Image accueil</label> 
            <label  class = "btn btn-primary col-md-9" for = "image-accueil-propos" >Changer l'image...</label> 
            <input name="file-image[]" id="image-accueil-propos" class="inputfile inputfile-1" type="file">
            <img id = "image-accueil" style="margin-left: 25%; margin-top: 10px" src = "<?php echo base_url('assets/image/'.$info -> ap_imageaccueil) ?>"/>
        </div>
        <div class="form-group">
            <label for = "" class = "col-md-3" >Image organigramme</label> 
            <label  class = "btn btn-primary col-md-9" for = "image-organigramme" >Changer l'image...</label> 
            <input name="file-image[]" id="image-organigramme" class="inputfile inputfile-1" type="file">
            <img id = "image-org" style=" margin-top: 10px" src = "<?php echo base_url('assets/image/'.$info -> ap_imageorganigramme) ?>"/>
        </div>
    </div>
</div>