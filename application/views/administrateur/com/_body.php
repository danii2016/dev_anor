<div id="main-content">
	<?php if(isset($authentify)) { ?>
		<div id="display-content" class= "col-xs-12">
			<?php $this->load->view($page); ?>
		</div>	
	<?php } else { ?>
			<div id="asside" class="col-xs-2">
				<?php $this->load->view('com/_right_menu'); ?>
			</div>
			<div id="display-content" class= "col-xs-10">
				<?php $this->load->view($page); ?>
			</div>	
	<?php } ?>	
</div>
