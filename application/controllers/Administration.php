<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends ANOR_Controller {

    protected $_JS = array("admin-script.js","lumino.glyphs.js");
	protected $_CSS = array("admin-styles.css","datepicker3.css","animation.css");
    
    protected $_ESPACE="administrateur/";
    protected $_VIEWDIR = "administrateur";
    
    protected $_MODELS = array("uti_utilisateur_m");
    
    protected $_PROTEGER = TRUE;
    
    public function __construct() {
		parent::__construct(); 
    }
    
	public function index() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
		$this->loadPage('accueil');
	}
    
    public function identification() {
        $this->loadData('authentify', true);
        $this->loadPage('com/_identification');
        //$res = $this -> uti_utilisateur_m -> save_user("1", "admin", "admin319");
    } 
    
    public function authentifier() {
        $login = $this -> input -> post('login');
        $pwd = $this -> input -> post('pass');
        $res = $this -> uti_utilisateur_m -> authentifie($login, $pwd);
        if($res['status']) {
            $this -> session -> userdata['session_admin_anor'] = $res['user'];
        }
        echo json_encode($res); 
    }
}