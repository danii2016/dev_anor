<div class="row row-fluid">
    <div class="col-md-6 col-xs-12">
        <h4>Liste des comptoirs</h4>
        <?php foreach($datas['comptoirs'] as $comptoir) { ?>
            <label><?php echo $comptoir -> cptr_libelle ?></label>
        <?php } ?>
        
    </div>    
    <div class="col-md-6 col-xs-12">
        <h4>Nos collaborateurs</h4>
        <ul>
        <?php foreach($datas['collaborateurs'] as $collab) { ?>
            <li><a href = "<?php echo $collab -> colb_url ?>" target="_blank"><?php
            if(isset($collab -> colb_logo) && $collab -> colb_logo != "" && is_file(APPPATH."../assets/image/logos_collab/".$collab -> colb_logo )) {
                ?><img src = "<?php echo base_url("assets/image/logos_collab/".$collab -> colb_logo) ?>" class = "logo-collaborateur" alt = "<?php echo $collab -> colb_nom ?>"><?php
            } else {
                echo $collab -> colb_nom ;
            } ?></a></li>
        <?php } ?>
        </ul>
    </div>
</div>