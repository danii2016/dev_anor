<?php $objectifs = array(); $roles = array();
    if(isset($data_propos)) {
        $objectifs = explode(';', $data_propos -> ap_objectifs);
        $roles = explode(';', $data_propos -> ap_roles);
        $buts = explode(';', $data_propos -> ap_but);
    }
?>
<center><img src="<?php echo base_url('assets/image/image_entree.png') ?>" id="image-entree" class="image-page-propos"></center>
<p id = "accueil-p">
<?php if(isset($data_propos)) echo $data_propos -> ap_presentation ?>
</p>
<h4 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titreobjectif ?></h4>
<p id = "objectif-p">
<ul id = "listee-objectifs">
    <?php foreach($objectifs as $obj) { ?>
    <li><?php echo $obj ?></li>
    <?php } ?>
</ul>
</p>
<h4 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titrerole ?></h4>
<p id = "roles-p">
<ul id = "liste-roles">
    <?php foreach($roles as $role) { ?>
    <li><?php echo $role ?></li>
    <?php } ?>
</ul>
</p>
<h5 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titrebut ?></h5>
<p id = "buts-p">
<ul id = "liste-buts">
    <?php foreach($buts as $but) { ?>
    <li><?php echo $but ?></li>
    <?php } ?>
</ul>
</p>
<h4 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titrerealisation ?></h4>
<p id = "presentation-p">
<?php if(isset($data_propos)) echo $data_propos -> ap_realisation ?>
</p>
<h4 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titreorganigramme ?></h4>
<img src="<?php echo base_url('assets/image/Organigramme.png') ?>" id="image-organigramme" class="image-page-propos">
<h4 class = "title-propos"><?php echo $this -> lang -> line('TITLE_ADMINS') ?></h4>
<?php if(isset($admins) && !empty($admins)) { ?>
    <ul id = "liste-administrateurs">
    <?php foreach($admins as $role) { ?>
        <li><?php echo $role -> radm_role ?></li>
        <ul id = "liste-noms">
        <?php foreach($role  -> admins as $adm) { ?>
            <li><?php echo $adm -> admin_civilite." ".$adm -> admin_prenom." ".$adm -> admin_nom ?></li>
        <?php } ?>
        </ul>
    <?php } ?>
    </ul>
<?php } else { ?>
   <div class = "alert alert-info">
    Liste des administrateurs temporairement indisponible
    </div> 
<?php } ?>