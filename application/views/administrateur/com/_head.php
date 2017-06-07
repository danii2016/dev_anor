<!DOCTYPE HTML>
<html lang="fr">
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administration ANOR<?php if(isset($page_admin)) echo " - ".$page_admin; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/image/favicon.ico'); ?>" type="image/x-icon" />
	
	<?php $this->load->view("administrateur/com/_css"); ?>
	<!-- <style type="text/css">
		.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
		    background: #184667!important;
		}
	</style> -->
</head>
<body>
<input type="hidden" id="base-url" value="<?php echo base_url(); ?>" />

