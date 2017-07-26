<?php
/**
 * Class name 	: Exportation_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-06-22
 */
class Exportation_m extends ANOR_Model{
   
	protected $_table = "exp_exportation";
    protected $_pk = "eexpt_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_exportationslastordered() {
        $res = $this -> db -> select('exp_exportation.*, eexp_nom, eexp_prenom')
                            -> join('exp_exportateur','exp_exportateur.eexp_id = exp_exportation.eexp_id')
                            -> get($this -> _table) -> result();
        return $res;
    }
    
}