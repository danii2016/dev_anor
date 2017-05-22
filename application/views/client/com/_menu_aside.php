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
    <div id = "content-photos">
        <?php if(isset($photos)) : ?>
                
        <?php else : ?>
            <div class = "alert alert-info">
                Pas de photo disponible!
            </div>
        <?php endif; ?>
    </div>
</div>