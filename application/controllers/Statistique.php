<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistique extends ANOR_Controller {
    
    protected $_JS = array();
	protected $_CSS = array("default.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
	public function index() {
		$this->loadData('page_menu','statistique');
		$this->loadPage('accueil');
	}
}