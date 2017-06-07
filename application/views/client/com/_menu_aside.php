<div id = "compteu-visite">
    <div class = "pull-right">
        <img id = "counter-image" src ="<?php echo base_url("assets/image/counter.jpg"); ?>" />
        <script type="text/javascript" src="http://www.abcompteur.com/cpt/?code=7/34/17147/0/1&ID=43497120048"></script><noscript><a href="http://www.abcompteur.com/" class = "pull-right">ABCompteur : compteur gratuit</a></noscript>
    </div>
</div>
<div id = "aside-actu">
    <h4 id = "title-actualité"><?php echo $this -> lang -> line('TITLE_ACTUALITE') ?></h4>
    <div id = "content-actualite">
        <?php if(isset($actualites)) : ?>
                
        <?php else : ?>
            <div class = "alert alert-info">
                Oops. Aucun actualité disponible pour le moment!
            </div>
        <?php endif; ?>
    </div>
</div>
<div id = "aside-photo">
    <h4 id = "title-photo"><?php echo $this -> lang -> line('TITLE_GALERIE') ?></h4>
    <div id = "content-photos" class = "carousel slide vertical" data-ride="carousel">
        <?php if(isset($photos) && !empty($photos)) : ?>
            <ol class="carousel-indicators">
            <?php foreach($photos as $i => $photo) : ?>
              <li data-target="#content-photos" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
            <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
            <?php foreach($photos as $i => $photo) : ?>
              <div class="item<?php echo $i == 0 ? ' active' : ''; ?>" id="galerie-<?php echo $photo ->gal_id; ?>" dir="<?php echo $photo ->gal_repertoire; ?>" >
                <img src="<?php echo base_url('assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); ?>" alt="<?php echo $photo ->gal_libelle; ?>" style="width:100%;">
                <div class="carousel-caption">
                  <h3><?php echo $photo ->gal_libelle; ?></h3>
                  <p><?php echo $photo ->gal_soutitre; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
              <!--<div class="item active">
                <img src="<?php echo base_url('assets/image/la.jpg'); ?>" alt="Los Angeles" style="width:100%; height: 100%;">
                <div class="carousel-caption">
                  <h3>Los Angeles</h3>
                  <p>LA is always so much fun!</p>
                </div>
              </div>

              <div class="item">
                <img src="<?php echo base_url('assets/image/chicago.jpg') ?>" alt="Chicago" style="width:100%; height: 100%;">
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <p>Thank you, Chicago!</p>
                </div>
              </div>

              <div class="item">
                <img src="<?php echo base_url('assets/image/ny.jpg') ?>" alt="New York" style="width:100%; height: 100%;">
                <div class="carousel-caption">
                  <h3>New York</h3>
                  <p>We love the Big Apple!</p>
                </div>
              </div>-->

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#content-photos" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-up"></span>
              <span class="sr-only">Précédent</span>
            </a>
            <a class="right carousel-control" href="#content-photos" data-slide="next">
              <span class="glyphicon glyphicon-chevron-down"></span>
              <span class="sr-only">Suivant</span>
            </a>
        <?php else : ?>
            <div class = "alert alert-info">
                Pas de photo disponible!
            </div>
        <?php endif; ?>
    </div>
</div>