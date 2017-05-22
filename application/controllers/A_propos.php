<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_propos extends ANOR_Controller {
    
    protected $_JS = array();
	protected $_CSS = array("default.css");
    protected $_MODELS = array("a_propos_m");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    public function __construct() {
		parent::__construct(); 
    }
    
	public function index() {
        $data_propos = $this -> a_propos_m -> get_propos();
		$this->loadData('data_propos',$data_propos);
		$this->loadData('page_menu','a-propos');
		$this->loadPage('propos');
	}
}
