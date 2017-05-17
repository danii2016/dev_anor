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
