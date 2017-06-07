<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistique extends ANOR_Controller {
    
    protected $_JS = array("default.js");
	protected $_CSS = array("default.css", "statistiques.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    protected $_MODELS = array("statistique_m");
    
	public function index() {
        $stats = $this -> statistique_m -> get();
		$this->loadData('stats', $stats);
		$this->loadData('page_menu','statistique');
		$this->loadPage('statistique');
	}
}
