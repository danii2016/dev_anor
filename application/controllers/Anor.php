<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anor extends ANOR_Controller {
    
    protected $_JS = array("default.js");
	protected $_CSS = array("default.css");
    protected $_MODELS = array("accueil_m");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    public function __construct() {
		parent::__construct(); 
    }
    
	public function index() {
        $acc = $this -> accueil_m -> get_accueil();
		$this->loadData('data_acc',$acc);
		$this->loadData('title_head',$acc -> acc_title);
		$this->loadData('page_menu','accueil');
		$this->loadPage('accueil');
	}
    
    public function get_imagegalerie($repertoire) {
        $fichiers = array_map("basename", glob(APPPATH.'../assets/image/galerie/'.str_replace('%20',' ',$repertoire).'/*.*'));
        //var_dump($repertoire);
        $this -> loadData('repertoire', str_replace('%20',' ',$repertoire));
        $this -> loadData('images', $fichiers);
        $this -> loadPageAjax('galerie_image');
    }
}
