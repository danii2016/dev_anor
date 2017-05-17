<?php
/**
 * Class name 	: Accueil_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-05-16
 */
class Accueil_m extends CI_Model{
   
	protected $_table = "accueil";
    protected $_pk = "acc_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_accueil($lang = $this -> _lang) {
        $acc = $this -> db -> where('acc_lang', $lang) -> get($this -> _table) -> row();
        return $acc;
    }
    
    public function update_accueil($title, $contenu, $lang = $this -> _lang) {
        $info_acc = array("acc_title" => $title,
                         "acc_content" => $contenu);
        return $this -> db -> where("acc_lang", $lang) -> update($this -> _table, $info_acc);
    }
    
}