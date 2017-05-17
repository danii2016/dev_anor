<?php
/**
 * Class name 	: Personne_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-05-16
 */
class Personne_m extends CI_Model{
   
	protected $_table = "personne";
    protected $_pk = "pers_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_personnes($lang = $this -> _lang) {
        $pers = $this -> db -> where('pers_lang', $lang) -> get($this -> _table) -> row();
        return $apers;
    }
    
   /* public function update_accueil($title, $contenu, $lang = $this -> _lang) {
        $info_acc = array("acc_title" => $title,
                         "acc_content" => $contenu);
        return $this -> db -> where("acc_lang", $lang) -> update($this -> _table, $info_acc);
    }*/
    
}