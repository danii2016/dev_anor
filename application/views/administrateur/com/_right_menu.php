<form role="search">
    <div class="form-group">
        <input id = "start-search" disabled = "disabled" type="text" class="form-control" placeholder="Search">
    </div>
</form>
<ul class="nav menu">
    <li <?php if($page_admin == "accueil") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_accueil'); ?>">Accueil</a></li>
    <li <?php if($page_admin == "actualite") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_actualite'); ?>">Actualites</a></li>
    <li <?php if($page_admin == "propos") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_propos'); ?>">A propos</a></li>
    <li <?php if($page_admin == "admin") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_administrateur'); ?>">Administrateurs</a></li>
    <li <?php if($page_admin == "galerie") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_galerie'); ?>">Galerie</a></li>
    <li <?php if($page_admin == "procedure") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_procedure'); ?>">Procédures</a></li>		
    <li <?php if($page_admin == "cadre_legal") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_cadre_legal'); ?>">Cadre légal</a></li>			
    <li <?php if($page_admin == "statistique") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_statistique'); ?>">Statistiques</a></li>
    <li <?php if($page_admin == "comptoir") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_comptoir'); ?>">Comptoirs</a></li>
    <li <?php if($page_admin == "lien") echo 'class="active"' ?>><a href="<?php echo base_url('administration/gerer_lien'); ?>">Liens professionnels</a></li>
</ul>