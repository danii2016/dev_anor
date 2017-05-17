<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anor extends ANOR_Controller {
    
    protected $_JS = array();
	protected $_CSS = array("default.css");
    protected $_MODELS = array("accueil_m");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
	public function index() {
        $acc = $this -> accueil_m -> get_accueil();
		$this->loadData('data_acc',$acc);
		$this->loadData('title_head',$acc -> acc_title);
		$this->loadData('page_menu','accueil');
		$this->loadPage('accueil');
	}
}
