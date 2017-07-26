<?php if(!isset($this -> session -> userdata['session_client_anor'])) { ?>
    <p>Vous devez vous authentifier pour pouvoir consulter le contenu
    <button class = 'btn btn-primary' id = 'toggle_modal' data-toggle = "modal" data-target = "#login-modal">Se connecter</button></p>
<?php } else {  ?>
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Liste des exportations
                    <!--<div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php $nbexp = 0; $nbli = 1;
                            if(empty($exports)) { ?>
                            <div class="alert alert-info" id = "exp-non-dispo">
                                Aucune exportation disponible pour le moment
                            </div>
                        <?php } else { 
                                $nbexp = count($exports);
                                $nbli = ceil($nbexp/25);
                             foreach($exports as $i => $exp) { ?>
                                <li class="list-group-item" id = "export-<?php echo $exp -> eexpt_id ?>" <?php if($i >= 25) echo 'style = "display:none;"' ?> >
                                    <div class="checkbox">
                                        <!--<input type="checkbox" id="checkbox" />-->
                                        <label for="checkbox">
                                            <?php echo $exp -> eexp_nom.' '.$exp -> eexp_prenom; ?>
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons">
                                        <a href="#" class="observe" title="Afficher détails"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </div>
                                    <div class="content-export" style="display:none">
                                        <div class="form-group">
                                            <label class = "col-md-4">
                                                Nom exportateur
                                            </label>
                                            <input type = "text" class = "nom-exp col-md-8" value = "<?php echo $exp -> eexp_nom ?>" disabled = "disabled" />
                                        </div>
                                        <div class="form-group">
                                            <label class = "col-md-4">
                                                Prénom exportateur
                                            </label>
                                            <input type = "text" class = "nom-exp col-md-8" value = "<?php echo $exp -> eexp_prenom ?>" disabled = "disabled" />
                                        </div>
                                        <div class="form-group">
                                            <label class = "col-md-4">
                                                Date d'enregistrement
                                            </label>
                                            <input type = "text" class = "nom-exp col-md-8" value = "<?php echo $exp -> eexpt_date ?>" disabled = "disabled" />
                                        </div>
                                        <div class="form-group">
                                            <label class = "col-md-4">
                                                Date d'exportation
                                            </label>
                                            <input type = "text" class = "nom-exp col-md-8" value = "<?php echo $exp -> eexpt_date ?>" disabled = "disabled" />
                                        </div>
                                        <div class="image-group">
                                            <h6>Liste des dossiers scannés</h6>
                                            <?php if($exp -> eexpt_image1 != "") { ?>
                                                <div class="container col-xs-3">
                                                  <img src="<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image1) ?>" alt="Dossier 1" class="image" style="width:100%">
                                                  <div class="middle">
                                                    <a class="btn" href = "<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image1) ?>" download><i class = "glyphicon glyphicon-download"></i></a>
                                                    <a class="btn btn-apercu" href = "#"><i class = "glyphicon glyphicon-picture"></i></a>
                                                  </div>
                                                </div>
                                            <?php } ?>
                                            <?php if($exp -> eexpt_image2 != "") { ?>
                                                <div class="container col-xs-3">
                                                  <img src="<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image2) ?>" alt="Dossier 1" class="image" style="width:100%">
                                                  <div class="middle">
                                                    <a class="btn" href = "<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image2) ?>" download><i class = "glyphicon glyphicon-download"></i></a>
                                                    <a class="btn btn-apercu" href = "#"><i class = "glyphicon glyphicon-picture"></i></a>
                                                  </div>
                                                </div>
                                            <?php } ?>
                                            <?php if($exp -> eexpt_image3 != "") { ?>
                                                <div class="container col-xs-3">
                                                  <img src="<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image3) ?>" alt="Dossier 1" class="image" style="width:100%">
                                                  <div class="middle">
                                                    <a class="btn" href = "<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image3) ?>" download><i class = "glyphicon glyphicon-download"></i></a>
                                                    <a class="btn btn-apercu" href = "#"><i class = "glyphicon glyphicon-picture"></i></a>
                                                  </div>
                                                </div>
                                            <?php } ?>
                                            <?php if($exp -> eexpt_image4 != "") { ?>
                                                <div class="container col-xs-3">
                                                  <img src="<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image4) ?>" alt="Dossier 1" class="image" style="width:100%">
                                                  <div class="middle">
                                                    <a class="btn" href = "<?php echo base_url('assets/documents/scans/'.$exp -> eexpt_image4) ?>" download><i class = "glyphicon glyphicon-download"></i></a>
                                                    <a class="btn btn-apercu" href = "#"><i class = "glyphicon glyphicon-picture"></i></a>
                                                  </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                       
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Total <span class="label label-info" id = "total-element"><?php echo $nbexp; ?></span>
                                   Afficher 
                                <select id = "nombre-affichage">
                                    <option value = "10">10</option>
                                    <option value = "25" selected>25</option>
                                    <option value = "50">50</option>
                                </select>
                            </h6>
                            
                        </div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled"><a id = "a-backward">«</a></li>
                                <?php for($i =0; $i < $nbli; $i++) { ?>
                                    <li <?php if($i == 0) echo 'class="active"' ?>><a ><?php echo $i + 1; ?></a></li>
                                <?php } ?>
                                <li <?php if($nbli == 1) echo 'class="disabled"' ?>><a id="a-forward">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
<?php } ?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" style="height:200px;" src="<?php echo base_url("assets/image/logo_anor.png") ?>">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Entrer votre login et votre mot de passe.</span>
                        </div>
                        <input id="login_username" class="form-control" placeholder="Nom d'utilisateur" required="" type="text">
                        <input id="login_password" class="form-control" placeholder="Mot de passe" required="" type="password">
                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<div class="modal fade" id="infoexport-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3>Exportation</h3>
            </div>
            <div class="modal-body">
                        
            </div>
            <div class="modal-footer">
                <!--<div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Fer</button>
                </div>-->
            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
 <div id = "modalImgZoom" class="modal">
      <!-- The Close Button -->
      <span class="close" onclick="hide_modal('modalImgZoom')" data-dismiss="modal">&times;</span>
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img-zoom" src="">
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>