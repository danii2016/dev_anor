<!DOCTYPE HTML>
<html lang="en">
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ANOR<?php if(isset($nom_page)) echo " - ".$nom_page; ?></title>
	<!--<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon" />-->
	
	<?php $this->load->view("client/com/_css"); ?>
</head>
<body>
<input type="hidden" id="base-url" value="<?php echo base_url(); ?>" />
<div class="row margin-right-ten" id = "header-content">
    <div class="hidden-xs col-md-12" id="content-head">
        <div class="hidden-xs col-md-12" id = "header-acronymes">
            <span class="pull-left" style="font-weight: bold;">
                <?php echo $this -> lang ->line("TITLE_MIN_MINE"); ?>
            </span>
            <span class="pull-right">
                <?php // echo $this -> lang ->line("TITLE_ANOR"); ?>
            </span>
        </div>
        <div class="hidden-xs col-md-12 margin-left-ten" id = "header-logos">
            <div class="pull-left" id = "logo-mines">
                <img class = "logo-image hidden-xs margin-top-ten" id="logo-image-min" src ="<?php echo base_url("assets/image/logo_mines.png"); ?>" />
            </div>
            <div class="pull-right row hidden-xs">
                <div class="info-icon col-md-5">
                    <img class = "info-icon-image" src ="<?php echo base_url("assets/image/phone.jpg"); ?>" />
                    <span id="span-contact">
                        <?php echo $this -> lang ->line("TEXT_CONTACT"); ?>
                    </span>
                </div>
                <div class="info-icon col-md-5">
                    <img class = "info-icon-image" src ="<?php echo base_url("assets/image/time.jpg"); ?>" />
                    <span id="span-time">
                        <?php echo $this -> lang ->line("TEXT_TIME"); ?>
                    </span>
                </div>
                <div class="col-md-2" id = "logo-anor">
                    <img class = "logo-image" id="logo-image-anor" src ="<?php echo base_url("assets/image/logo_anor.png"); ?>" />
                </div>
            </div>
        </div>
        <div id = "header-nav-container" class = "col-md-12 margin-left-ten">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand visible-xs" href="#">ANOR</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="<?php if($page_menu == "accueil") echo "active"; ?>">
                        <a href="<?php echo base_url(); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_home.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_HOME"); ?></span>
                        </a>
                    </li>
                    <li class="<?php if($page_menu == "a-propos") echo "active"; ?>">
                        <a href="<?php echo base_url("a_propos"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_about.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_ABOUT"); ?></span>
                        </a>
                    </li>
                    <li class="<?php if($page_menu == "procedure-a-suivre") echo "active"; ?>">
                        <a href="<?php echo base_url("procedure_a_suivre"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_process.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_PROCESS"); ?></span>
                        </a>
                    </li>
                    <li class="<?php if($page_menu == "disposition-legale") echo "active"; ?>">
                        <a href="<?php echo base_url("disposition_legale"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_disposition.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_DISPOSITION"); ?></span>
                        </a>
                    </li>
                    <!--<li class="<?php if($page_menu == "notre-equipe") echo "active"; ?>">
                        <a href="<?php echo base_url("notre_equipe"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_collegues.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_EQUIPE"); ?></span>
                        </a>
                    </li>-->
                    <li class="<?php if($page_menu == "statistique") echo "active"; ?>">
                        <a href="<?php echo base_url("statistique"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_stat.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_STATISTIQUE"); ?></span>
                        </a>
                    </li>
                    <li class="<?php if($page_menu == "liens-professionnels") echo "active"; ?>">
                        <a href="<?php echo base_url("liens_professionnels"); ?>" class="menu-link">
                            <img class = "menu-icon-image hidden-xs" src ="<?php echo base_url("assets/image/menu_link.jpg"); ?>" /><br/>
                            <span class="icon-bar"><?php echo $this -> lang ->line("TEXT_MENU_LINK"); ?></span>
                        </a>
                    </li>
                  </ul>
                  <!--<ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>-->
                </div>
              </div>
            </nav>
        </div>
    </div>
</div>