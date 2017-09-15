 <div class="main-wrapper">
    <button type="button" class="btn btn-primary pull-right" id="save-accueil" >
        <span class="glyphicon glyphicon-ok" style="margin-right: 0px;"></span> Enregistrer
    </button>
    <h3>Texte accueil</h3> 
    <div class = "alert alert-success">Enregistré avec succès</div> 
    <div class = "alert alert-danger">Une erreur s'est produite</div> 
    <div class="content-ui">
        <div class="form-group">
            <label for = "titre-accueil" class = "col-md-3">Titre</label> 
            <input  class = "col-md-9" type = "text" id="titre-accueil" value = "<?php echo $info -> acc_title ?>" />
        </div>
        <div class="form-group">
            <label for = "mot-accueil" style = "padding-left: 15px;">Contenu</label> 
            <textarea id="mot-accueil">
                <?php echo $info -> acc_content ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for = "" class = "col-md-3" >Image du directeur</label> 
            <label  class = "btn btn-primary col-md-9" for = "image-directeur" >Changer l'image...</label> 
            <input name="file-image[]" id="image-directeur" class="inputfile inputfile-1" type="file">
            <img id = "image-dir" style=" margin-top: 10px; margin-left: 25%" src = "<?php echo base_url('assets/image/pictures/'.$info -> acc_image) ?>"/>
        </div>
    </div>
</div>