<div id="main-content">
	<?php if(isset($authentify)) { ?>
		<div id="display-content" class= "col-xs-12">
			<?php $this->load->view($page); ?>
		</div>	
	<?php } else { ?>
			<div id="asside" class="col-xs-2">
				<?php $this->load->view('administrateur/com/_right_menu'); ?>
			</div>
			<div id="display-content" class= "col-xs-10">
				<?php $this->load->view($page); ?>
			</div>	
	<?php } ?>	
</div>
<!--Modal - profil -->
<div class = "modal modal-fade" role="dialog" id = "modal-gererprofil">
    <div class="modal-dialog">
     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <div class="alert alert-danger" id = "error-saveprofil">Erreur lors du traitement</div>
      </div>
      <div class="modal-body">
        <input type="hidden" id = "id-user" value = "<?php echo $this -> session ->userdata['session_admin_anor'] -> uti_id ?>" />
        <div class="">
            <div class = "form-group row row-fluid">
                <label class = "col-sm-3" for = "input-login-user">Nom d'utilisateur</label>
                <input  class = "col-sm-9" id = "input-login-user" name = "input-nom-colab" placeholder = "Entrer login" value = "<?php echo $this -> session ->userdata['session_admin_anor'] -> uti_login ?>" />
            </div>            
            <div class = "form-group row row-fluid">
                <label class = "col-sm-3" for = "input-last-pass">Mot de passe actuel</label>
                <input type="password"  class = "col-sm-9" id = "input-last-pass" name = "input-nom-colab" placeholder = "*******" />
            </div>           
            <div class = "form-group row row-fluid">
                <label class = "col-sm-3" for = "input-new-pass">Nouveau mot de passe</label>
                <input type="password"  class = "col-sm-9" id = "input-new-pass" name = "input-nom-colab" placeholder = "*******" />
            </div>           
            <div class = "form-group row row-fluid">
                <label class = "col-sm-3" for = "input-confirm-pass">Confirmer mot de passe</label>
                <input type="password"  class = "col-sm-9" id = "input-confirm-pass" name = "input-nom-colab" placeholder = "*******"/>
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = "valider-profil">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
