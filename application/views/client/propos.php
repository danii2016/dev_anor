<center><img src="<?php echo base_url('assets/image/'.$data_propos -> ap_imageaccueil) ?>" id="image-entree" class="image-page-propos"></center>
<?php echo $data_propos -> ap_contenu ?>
<h4 class = "title-propos"><?php if(isset($data_propos)) echo $data_propos -> ap_titreorganigramme ?></h4>
<img src="<?php echo base_url('assets/image/'.$data_propos -> ap_imageorganigramme) ?>" id="image-organigramme" class="image-page-propos">
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