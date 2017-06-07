<div class="row row-fluid">
    <div id="cadre-liste-container" class="col-md-4 col-xs-12">
    <?php if(isset($cadres) && !empty($cadres)) { 
        foreach($cadres as $cadre) { 
            $fichiers = array_map('basename', glob(APPPATH.'../assets/documents/cadres/'.$cadre -> cad_repertoire.'/*.*')); 
            if(!empty($fichiers)) {
        ?>
        <h5 class = "titre-cadre"><?php echo $cadre -> cad_titre ?></h5> 
        <?php 
            foreach($fichiers as $fic) {
                $nom = substr($fic, 0, strpos($fic,'.'));
              ?> <a href = "<?php echo base_url('assets/documents/cadres/'.$cadre -> cad_repertoire.'/'.$fic) ?>" class = "cadre-fichier-pdf"><?php echo $nom ?></a><br/> 
                <?php  
            }
        ?>
     <?php
            }
        }
     } ?>
    </div>
    <div id="pdf-main-container" class="col-md-8 col-xs-12">
        <div id="pdf-main-wrapper" style="display: none;">
            <div id="pdf-loader" class="pull-left">Chargement du document ...</div>
            <div id="pdf-contents">
                <div id="pdf-meta">
                    <div id="pdf-buttons" class="pull-right">
                        <a id="pdf-prev"><i class = "glyphicon glyphicon-step-backward"></i> Précédent</a> - 
                        <a id="pdf-next">Suivant <i class="glyphicon glyphicon-step-forward"></i></a>
                    </div>
                    <div id="page-count-container">Page <span id="pdf-current-page"></span> sur <span id="pdf-total-pages"></span></div>
                </div>
                <canvas id="pdf-canvas" width="550"></canvas>
                <div id="page-loader">Chargement de la page ...</div>
            </div>
        </div>
        <div id="pdf-main-info">
            <h3><i class="glyphicon glyphicon-info-sign"></i> Sélectionnez un document</h3>
        </div>
    </div>
</div>