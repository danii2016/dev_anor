<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_a_suivre extends ANOR_Controller {
    
    protected $_JS = array("default.js");
	protected $_CSS = array("default.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
	public function index() {
		$this->loadData('page_menu','procedure-a-suivre');
		$this->loadPage('accueil');
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
