<img src="<?php echo base_url('assets/image/pictures/dg.jpg') ?>" id="image-accueil" class="image-page-accueil">
<p id = "accueil-p">
<?php if(isset($data_acc)) echo $data_acc -> acc_content ?>
</p>
<p>
<span class = "pull-right">
<?php if(isset($data_acc)) echo $data_acc -> pers_nom." ".$data_acc -> pers_prenom."<br/>" ?>
<?php if(isset($data_acc)) echo $data_acc -> pers_poste ?>
</span>
</p>
