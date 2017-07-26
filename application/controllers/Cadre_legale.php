<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadre_legale extends ANOR_Controller {
    
    protected $_JS = array("default.js","pdf.js","pdf.worker.js", "cadre.js");
	protected $_CSS = array("default.css","cadre.css");
    protected $_MODELS = array("cadre_m");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
	public function index() {
        $cadres = $this -> cadre_m -> get();
		$this->loadData('page_menu','disposition-legale');
		$this->loadData('rubriques',$cadres);
		$this->loadPage('cadre_legale');
	}
}
