<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends ANOR_Controller {

    protected $_JS = array("admin-script.js");
	protected $_CSS = array("admin-styles.css","datepicker3.css","animation.css");
    
    protected $_ESPACE="administrateur/";
    protected $_VIEWDIR = "administrateur";
    
    protected $_PROTEGER = TRUE;
    
    public function __construct() {
		parent::__construct(); 
    }
    
	public function index() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
		$this->load->view('welcome_message');
	}
    
    public function identification() {
        $this->loadData('authentify', true);
        $this->loadPage('com/_identification');
    } 
}