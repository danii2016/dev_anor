<div id = "list-equipe-container" class = "row row-fluid">
    <?php if(!empty($equipes)) {
            foreach($equipes as $pers) { ?>
                <div class = "personne-equipe col-md-6 col-xs-12">
                    <a class="link-personne" id="personne-<?php echo $pers['pers_id'] ?>">
                        <img src="<?php echo base_url('assets/image/pictures/'.$pers['pers_image']) ?>" class = "img-round-personne">
                        <label class="nom-prenom"><?php echo $pers['pers_civilite']." ".$pers['pers_nom']." ".$pers['pers_prenom'] ?></label>
                        <label class="info-suppl"><?php echo $pers['pers_info'] ?>"</label>
                    </a>
                </div>
    <?php   }
    } else { ?>
        <div class = "alert alert-info">
            Oops! Aucune information à afficher pour le moment...
        </div>
    <?php } ?>
</div>