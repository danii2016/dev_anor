<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class name 	: Anor_Controller
 * author 		: Andry
 * mail 		: dandriaritiana1@gmail.com
 * version 		: 1.0
 * create		: 2017-05-05
 */
class ANOR_Controller extends CI_Controller {
	
	/**
	 * Tous les données chargées sur une page doivent être dans $_DATA
	 */
	protected $_DATA = array();
	private $_SCRIPTS = array("jquery-3.2.1.min.js","bootstrap.min.js");
	private $_STYLES = array("bootstrap.min.css","bootstrap-theme.min.css","global.css");
	protected $_JS = array();
	protected $_CSS = array();
	/**
	 *	Liste des accés de chaque utilisateur pour chaque escpace 
	 */
	protected $_CTRLS = array("anor","administration") ;

	/**
	 * sous repertoire dans views contenant les composant HTML de la page
	 * à initialiser à chaque controller
	 */
    protected $_VIEWDIR = "";
	
	/**
	 *  si $_PROTEGER = TRUE la page est protegée par mot de passe
	 */
	protected $_PROTEGER = FALSE;
	
	/**
	 *  si $_MODULE_DROIT la page est protegée par mot de passe
	 */
	protected $_MODULE_DROITS = array();

	/**
	 * liste des models Utilisés
	 */
	protected $_MODELS = array();
	protected $_PROFILS = array();
	/**
	 * Constructeur
	 */
    protected $_ESPACE="";
    protected $_TEMPLATE = "com/_layout";
	 
	public function __construct() {
		parent::__construct(); 
		
		$this->loadModelConfig();

		$this -> load -> helper('url');

		$this->_data['lang'] = $this->choixLangue();
	}

	public function testPage404($contr)
	{
		$val = strpos($contr, '_') ;
		if($val !== false)
		{
			$str = explode("_", $contr);
			$res =  array_search(strtolower($str[0]),$this->_CTRLS) ;
		}
		else $res =  array_search(strtolower($contr),$this->_CTRLS) ;
		if($res === false) $this->page404() ;
	}

	public function page404()
	{
		$this->session->set_flashdata("message", "ERREUR 404 - Cette page n'existe pas");
		$this->_ESPACE = "espaceMessage/";
		$this->_VIEWDIR= $this->_ESPACE  ;
		redirect("message");
	}

	/**
	 * Charger une page
	 */
	public function loadPage($view) {
        $this->_TEMPLATE = $this->_ESPACE."com/_layout";	
        $this->_DATA["page"] = $this->_VIEWDIR ."/" .$view;
		$this->loadStyle();
		$this->loadScript();
		$this->load->view($this->_TEMPLATE,$this->_DATA);
	}
	
	protected function loadScript(){
		if(count($this->_SCRIPTS)) {
			foreach ($this->_SCRIPTS as $script) {
				$this->_DATA["Scripts"][] = $script;
			}
		}
		if(count($this->_JS)) {
			foreach ($this->_JS as $script) {
				$this->_DATA["Scripts"][] = $script;
			}
		}
	}
	
	private function loadStyle(){
		if(count($this->_STYLES)) {
			foreach ($this->_STYLES as $style) {
				$this->_DATA["Styles"][] = $style;
			}
		}
		
		if(count($this->_CSS)) {
			foreach ($this->_CSS as $style) {
				$this->_DATA["Styles"][] = $style;
			}
		}
	}
		
	public function loadPageAjax($view) {
		$page= $this->_VIEWDIR ."/" .$view;
		$this->load->view($page,$this->_DATA);
	}
	
	/**
	 * initialiser $_DATA
	 */
	 public function loadData($var,$data){
	 	$this->_DATA[$var] = $data;
	 } 
	 
	 public function loadModelConfig(){
	 	foreach ($this->_MODELS as $model) {
			 $this->load->model($model);
		 }	
	 }
	 
	 public function convertDate_m_d_y_To_y_d_m($date_){
	 	$date = new DateTime($date_);
			return $date->format('Y-m-d');
	 }
	
	 protected function choixLangue() {
	 		$lang = "fr";
			switch ($lang) {
				case 'fr':$this->lang->load('french','french');
				   break;
				case 'en':$this->lang->load('english','english');
				   break;
				case 'de':$this->lang->load('english','english');
				   break;
				case 'es':$this->lang->load('english','english');
				   break;
				case 'po':$this->lang->load('english','english');
				   break;
				case 'ne':$this->lang->load('english','english');
				   break;
				case 'ru':$this->lang->load('english','english');
				   break;
			   default:$this->lang->load('english','english');
			}
			
		return $lang;	
	}

	protected function new_print_r($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}


}