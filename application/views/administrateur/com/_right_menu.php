<?php 
	$user = $this->session->userdata("session_ent_user");
    $id = "";
	switch ($user['profil']) {
		case 'A':
			$id .= "espaceAdministrateur";
			break;
		case 'P':
			$id .= "espaceProfesseurs";
			break;
		case 'F':
			$id .= "espaceResponsables";
			break;
		case 'E':
			$id .= "espaceEleves";
			break;
		case 'D':
			$id .= "espaceAdministrationDirection";
			break;			
		default:
			break;
	}
?>
<form id="formChng" role="form">
	<div class="infodiv">Changement de mot de passe</div>
	</br>
	<div class="form-group" id="">
    	<label for="mdp" class="col-sm-4 control-label">Ancien mot de passe</label>
	    <div class="col-sm-6">
	      <input type="password" class="form-control"  id="oldmdp" required>
	    </div>
    </div>
    <div class="form-group" id="">
    	<label for="mdp" class="col-sm-4 control-label">Nouveau mot de passe</label>
	    <div class="col-sm-6">
	      <input type="password" class="form-control"  id="newmdp">
	    </div>
    </div>
    <div class="form-group" id="">
    	<label for="mdp" class="col-sm-4 control-label">Confirmation</label>
	    <div class="col-sm-6">
	      <input type="password" class="form-control"  id="confmdp">
	  	  <!-- <br> -->
	      <!-- <input class="btn btn-xs btn-primary pull-right savemdp" value="Enregistrer" id="<?php echo $id ?>" /> -->
	    </div>
    </div>
		<div class="infomsg" id="erreur">
				<?php if(!empty($msgErr)) echo $msgErr; ?>		
		</div>
</form>

<?php $user = $this->session->userdata("session_ent_user");?>
<div id="testsel">
	<?php if($user['changeMdp'] == "1") { ?>
	<div class="form-group" id="">
    	<label for="mdp" class="col-sm-3 control-label">Mot de passe</label>
	    <div class="col-sm-7">
	      <input type="password" class="form-control" readonly="readonly" value="<?php // echo $user['mdp'] ?>*******" id="mdp">
	      <a class="changmdp control-label pull-right" href="#" id="<?php echo $id ?>" >
	      	Changer le mot de passe
	      </a>
	    </div>
    </div>
    <div class="infomsg" id="erreur">
			<?php if(!empty($msgErr)) echo $msgErr; ?>
	</div>
	<?php } else {?> 
		<div class="alert alert-warning text-left">
        	<span class="glyphicon glyphicon-info-sign"></span> Désolé, vous n'êtes pas autorisé à modifier votre mot de passe.
    	</div>
	<?php } ?>
</div>