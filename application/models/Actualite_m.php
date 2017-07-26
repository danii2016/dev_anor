<?php
/**
 * Class name 	: Actualite_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-06-18
 */
class Actualite_m extends ANOR_Model{
   
	protected $_table = "actu_actualite";
    protected $_pk = "aact_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_actualites() {
        $acts = $this -> db -> select('actu_actualite.*, (select aart_contenu from actu_article where aact_id = actu_actualite.aact_id limit 1) as article') -> order_by('actu_actualite.aact_dateajout','desc') -> get($this->_table) -> result();
        return $acts;
    }
    
    public function get_infoactualites($id) {
        $actu = $this -> db -> where('aact_id', $id) -> get($this -> _table) -> row();
        if(empty($actu)) {
             $acts = $this -> db -> order_by('actu_actualite.aact_dateajout','desc') -> get($this->_table) -> result();
            if(empty($acts)) {
                return array();
            } else {
                $actu = $acts[0];
            }
        }
        $articles = $this -> db -> where('aact_id', $actu -> aact_id) -> get('actu_article') -> result();
        return array('actualite' => $actu, 'articles' => $articles);
    }
}