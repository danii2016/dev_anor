<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liens_professionnels extends ANOR_Controller {
    
    protected $_JS = array("default.js","liens.js","par_page.js");
	protected $_CSS = array("default.css","liens.css");
    
    protected $_ESPACE="client/";
    protected $_VIEWDIR = "client";
    
    protected $_MODELS = array('uti_utilisateur_m','exportation_m', 'lien_m');
    
    public function __construct() {
        parent::__construct();
        $this -> load -> library('session');
        //var_dump(sha1("1234+"));
    }
    
	public function index() {
        $datas = $this -> lien_m -> get_datas();
        $this -> loadData('datas', $datas);
		$this->loadData('page_menu','liens-professionnels');
		$this->loadPage('liens');
	}
    
    public function authentifier() {
        $login = $this -> input -> post('login');
        $pass = $this -> input -> post('pass');
        $res = $this -> uti_utilisateur_m -> authentifie($login, $pass);
        if($res['status']) {
            $this -> session -> userdata['session_client_anor'] = $res['user'];
        }
        echo json_encode($res); 
    }
}
