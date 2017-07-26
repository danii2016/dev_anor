<div id = "compteu-visite">
    <div class = "pull-right">
        <img id = "counter-image" src ="<?php echo base_url("assets/image/counter.jpg"); ?>" />
        <script type="text/javascript" src="http://www.abcompteur.com/cpt/?code=7/34/17147/0/1&ID=43497120048"></script><noscript><a href="http://www.abcompteur.com/" class = "pull-right">ABCompteur : compteur gratuit</a></noscript>
    </div>
</div>
<div id = "aside-actu">
    <h4 id = "title-actualité"><?php echo $this -> lang -> line('TITLE_ACTUALITE') ?></h4>
    <div id = "content-actualite" class = "row row-fluid">
        <?php if(isset($actualites) && !empty($actualites)) : ?>
            <?php foreach($actualites as $actu) { ?>
                <div class = "actualite"> 
                    <h5 id = "titreactu-<?php echo $actu -> aact_id ?>"><?php echo $actu -> aact_titre ?></h5> 
                    <p><?php echo substr($actu -> article, 0, 200)." (...)" ?></p> 
                </div> 
            <?php } ?>
        <?php else : ?>
            <div class = "alert alert-info">
                Oops. Aucun actualité disponible pour le moment!
            </div>
        <?php endif; ?>
    </div>
</div>
<div id = "aside-photo">
    <h4 id = "title-photo"><?php echo $this -> lang -> line('TITLE_GALERIE') ?></h4>
    <div id = "content-photos" class = "row row-fluid">
        <?php if(isset($photos) && !empty($photos)) : ?>
            <?php foreach($photos as $i => $photo) : ?>
              <div class="col-xs-6 image-galerie" id="galerie-<?php echo $photo ->gal_id; ?>" dir="<?php echo $photo ->gal_repertoire; ?>" >
                <h5><?php echo $photo ->gal_libelle; ?></h5>
                <img src="<?php echo base_url('assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu); ?>" alt="<?php echo $photo ->gal_libelle; ?>" style="width:100%;">
              </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class = "alert alert-info">
                Pas de photo disponible!
            </div>
        <?php endif; ?>
    </div>
</div>
<div id = "aside-adresse">
    <h4 id = "title-adresse"><?php echo $this -> lang -> line('TITLE_ADRESSE') ?></h4>
    <div id = "content-adresse" class = "row row-fluid">
        <?php if(isset($adresse)) : ?>
            <?php echo $adresse ?>
        <?php else : ?>
            <div class = "alert alert-info">
                Pas d'adresse disponible disponible!
            </div>
        <?php endif; ?>
    </div>
</div>