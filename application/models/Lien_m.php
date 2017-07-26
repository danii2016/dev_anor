<?php
/**
 * Class name 	: Lien_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-07-19
 */
class Lien_m extends ANOR_Model{
   
	protected $_table = "collaborateur";
    protected $_pk = "colb_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_datas() {
        $colabs = $this -> db -> get($this -> _table) -> result();
        $cptrs = $this -> db -> get('comptoir') -> result();
        return array('collaborateurs' => $colabs, 'comptoirs' => $cptrs);
    }
}