
<!--<ol class="carousel-indicators">
<?php var_dump($images); foreach($images as $i => $image) : ?>
  <li data-target="#content-photo-galerie" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
<?php endforeach; ?>
</ol>-->
<div class="carousel-inner">
<?php foreach($images as $i => $image) : ?>
  <div class="item<?php echo $i == 0 ? ' active' : ''; ?>" >
    <img src="<?php echo base_url('assets/image/galerie/'.$repertoire.'/'.$image); ?>" style="width:100%;">
    <!--<div class="carousel-caption">
      <h3><?php echo $photo ->gal_libelle; ?></h3>
      <p><?php echo $photo ->gal_soutitre; ?></p>
    </div>-->
  </div>
<?php endforeach; ?>
    
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#content-photo-galerie" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Précédent</span>
</a>
<a class="right carousel-control" href="#content-photo-galerie" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Suivant</span>
</a>