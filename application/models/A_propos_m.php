<?php
/**
 * Class name 	: A_propos_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-05-22
 */
class A_propos_m extends ANOR_Model{
   
	protected $_table = "a_propos";
    protected $_pk = "ap_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_propos($lang = "fr") {
        $ap = $this -> db -> where('ap_lang', $lang)
                            -> get($this -> _table) -> row();
        return $ap;
    }
    
    public function update_propos($title, $contenu, $lang = "fr") {
        $info_acc = array("acc_title" => $title,
                         "acc_content" => $contenu);
        return $this -> db -> where("acc_lang", $lang) -> update($this -> _table, $info_acc);
    }
    
}