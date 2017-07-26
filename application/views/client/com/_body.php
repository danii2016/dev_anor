<div id="main-content">
    <div id="upper-content" class= "col-md-8 col-xs-12" style="<?php if(!isset($title_head)) echo "padding-top:40px" ?>"> 
        <?php if(isset($title_head)): ?>
            <h4 id = "title-head"><?php echo $title_head ?></h4>
        <?php endif; ?>
        <div id="display-content"> 
            <?php $this->load->view($page); ?>
        </div>	
    </div>	
    <div id="asside" class="col-md-4 col-xs-12">
        <?php $this->load->view("client/com/_menu_aside"); ?>
    </div>
</div>
<div class="modal fade" id="modal-galerie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h5 class="modal-title" id="title-galerie"><b>Galrie image<?php if(isset($title)) echo ' : '.$title ?></b></h5>
      </div>
      <div class="modal-body row">
		<div id = "content-photo-galerie" class = "carousel slide col-md-12" data-ride="carousel">
            
        </div>
      </div>
    </div>
  </div>
</div>