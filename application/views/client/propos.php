<?php $objectifs = array(); $roles = array();
    if(isset($data_propos)) {
        $objectifs = explode(';', $data_propos -> ap_objectifs);
        $roles = explode(';', $data_propos -> ap_roles);
    }
?>
<img src="<?php echo base_url('assets/image/image_entree.png') ?>" id="image-entree" class="image-page-propos">
<h3 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titrepresentation ?></h3>
<p id = "accueil-p">
<?php if(isset($data_propos)) echo $data_propos -> ap_presentation ?>
</p>
<h3 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titreobjectif ?></h3>
<p id = "accueil-p">
<ul id = "listee-objectifs">
    <?php foreach($objectifs as $obj) { ?>
    <li><?php echo $obj ?></li>
    <?php } ?>
</ul>
</p>
<h3 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titrerole ?></h3>
<p id = "accueil-p">
<ul id = "liste-roles">
    <?php foreach($roles as $role) { ?>
    <li><?php echo $role ?></li>
    <?php } ?>
</ul>
</p>
<h3 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titreorganigramme ?></h3>
<img src="<?php echo base_url('assets/image/Organigramme.png') ?>" id="image-organigramme" class="image-page-propos">