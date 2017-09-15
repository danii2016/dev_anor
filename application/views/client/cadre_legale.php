<?php function sort_with_order($a1, $a2) {
    $numorder = 5;
    $num1 = substr($a1, 0, $numorder);
    $num2 = substr($a2, 0, $numorder);
    while(!is_numeric($num1) && !is_numeric($num2) && $numorder > 0) {
        if(!is_numeric($num1)) {
            $num1 = substr($a1, 0, $numorder);
        }        
        if(!is_numeric($num2)) {
            $num2 = substr($a2, 0, $numorder);
        }
        $numorder--;
    }
    if(!is_numeric($num1)) {
        $num1 = 0;
    }        
    if(!is_numeric($num2)) {
        $num2 = 0;
    }
    return $num1 > $num2;
} 
?>
<div class="row row-fluid">
    <ul class="nav nav-tabs">
        <?php foreach($rubriques as $key => $rub) {
            ?><li class="<?php echo $key == 0 ? 'active' : ''?>"><a data-toggle="tab" href="#cadre-<?php echo $rub -> crub_id; ?>"><?php echo $rub -> crub_libelle; ?></a></li><?php
        } ?>
    </ul>

    <div class="tab-content">
        <?php foreach($rubriques as $key => $rub) { ?>
        <div class="tab-pane fade <?php echo $key == 0 ? 'in active' : ''?>" id ="cadre-<?php echo $rub -> crub_id; ?>" >
            <div class="row row-fluid">
                <div id="cadre-liste-container" class="col-md-4 col-xs-12">
                <?php  $fichiers = array_map('basename', glob(APPPATH.'../assets/documents/cadres/'.$rub -> crub_repertoire.'/*.*')); 
                        if(!empty($fichiers)) {
                            usort($fichiers, "sort_with_order");
                            foreach($fichiers as $fic) {
                                $nom = substr($fic, 0, strpos($fic,'.'));
                              ?> <a source = "<?php echo base_url('assets/documents/cadres/'.$rub -> crub_repertoire.'/'.$fic) ?>" class = "cadre-fichier-pdf"><?php echo $nom ?></a><br/> 
                                <?php  
                            }
                        ?>
                     <?php
                        }
                  ?>
                </div>
                <div class="col-md-8 col-xs-12">
                    <?php if($key == 0) : ?>
                    <div id="pdf-main-container">
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
                                <div class="pull-right"><a id="pdf-download" href = "" download>Télécharger <i class="glyphicon glyphicon-download"></i></a></div>
                                <div id="page-loader">Chargement de la page ...</div>
                            </div>
                        </div>
                        <div id="pdf-main-info">
                            <h3><i class="glyphicon glyphicon-info-sign"></i> Sélectionnez un document</h3>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    
    
</div>