
<div class = "" id = "procedures-wrapper">
    <ul class="nav nav-tabs">
        <?php foreach($procedures as $key => $proc) {
            ?><li class="<?php echo $key == 0 ? 'active' : ''?>"><a data-toggle="tab" href="#proc-<?php echo $proc -> pproc_id; ?>"><?php echo $proc -> pproc_libelle; ?></a></li><?php
        } ?>
    </ul>

    <div class="tab-content">
        <?php foreach($procedures as $key => $proc) { 
            $nblang = count($proc -> contenu);
        ?>
        <div class="tab-pane fade <?php echo $key == 0 ? 'in active' : ''?>" id ="proc-<?php echo $proc -> pproc_id; ?>" >
            <div class="row row-fluid">
                <?php foreach($proc -> contenu as $i => $cont) { ?>
                    <div class = "procedure-content col-md-12" <?php if($i != 0) echo "style = 'display: none;'" ?> lang = "<?php echo $cont -> pcont_lang; ?>">
                        <div class = "pull-right lang-content">
                            <img class = "flag-image mg-flag" src ="<?php echo base_url("assets/image/mg.png"); ?>" <?php if($nblang == 1 && $cont-> pcont_lang != "mg") echo 'style = "display:none"; '?> />  
                            <img class = "flag-image fr-flag" src ="<?php echo base_url("assets/image/fr.png"); ?>" <?php if($nblang == 1 && $cont -> pcont_lang != "fr") echo 'style = "display:none"; '?>/>
                        </div>
                        <?php echo $cont -> pcont_contenu; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>