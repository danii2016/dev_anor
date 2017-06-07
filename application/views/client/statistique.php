<div class = "" id = "stats-wrapper">
    <ul class="nav nav-tabs">
        <?php foreach($stats as $key => $stat) {
            ?><li class="<?php echo $key == 0 ? 'active' : ''?>"><a data-toggle="tab" href="#<?php echo $stat -> stat_annee; ?>"><?php echo $stat -> stat_annee; ?></a></li><?php
        } ?>
    </ul>

    <div class="tab-content">
        <?php foreach($stats as $key => $stat) {
            $images = array_map('basename', glob(APPPATH.'../assets/documents/statistiques/'.$stat -> stat_repertoire.'/*.*'));
            ?>
        <div class="tab-pane fade <?php echo $key == 0 ? 'in active' : ''?>" id ="<?php echo $stat -> stat_annee; ?>">
            <div class="row row-fluid">
                <?php foreach($images as $img) { ?>
                    <div class = "stat-image-container col-md-4">
                        <img src="<?php echo base_url("assets/documents/statistiques/".$stat -> stat_repertoire."/".$img); ?>" class = "image-stat" />
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <!-- The Modal -->
    <div id = "modalImgStat" class="modal">
      <!-- The Close Button -->
      <span class="close" onclick="hide_modal('modalImgStat')" data-dismiss="modal">&times;</span>
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img-zoom" src="">
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>
</div>