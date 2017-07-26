<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actualites extends ANOR_Controller {
    
    protected $_JS = array("default.js");
	protected $_CSS = array("default.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    protected $_MODELS = array('actualite_m');
    
    public function __construct() {
        parent::__construct();
        //var_dump(sha1("1234+"));
    }
    
	public function index() {
        redirect('actualites/consulter');
	}
    
    public function consulter($id = null) {
        $infos = $this->actualite_m-> get_infoactualites($id);
		$this->loadData('title_head','ACTUALITES'.(isset($infos['actualite']) ? ' : '.$infos['actualite'] -> aact_titre : ""));
        $this->loadData('articles', isset($infos['articles']) ? $infos['articles'] : NULL);
        $this->loadData('page_menu','actualite');
		$this->loadPage('actualites');
    }
}
