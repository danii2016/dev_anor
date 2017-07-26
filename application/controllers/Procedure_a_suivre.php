<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_a_suivre extends ANOR_Controller {
    
    protected $_JS = array("default.js","procedure.js");
	protected $_CSS = array("default.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    protected $_MODELS = array("procedure_m");
    
	public function index() {
        $procedures = $this -> procedure_m -> get_procedures();
		$this->loadData('procedures',$procedures);
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('procedure');
	}
    
	public function orpailleur() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
    
	public function collecteur_1() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
    
	public function collecteur_2() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
    
	public function comptoir_com() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
    
	public function comptoir_fonte() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
    
	public function exportation() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
	}
}
