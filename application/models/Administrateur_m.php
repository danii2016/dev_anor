<?php
/**
 * Class name 	: Administrateur_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-07-4
 */
class Administrateur_m extends ANOR_Model{
   
	protected $_table = "administrateur";
    protected $_pk = "admin_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_admins() {
        $datas = $this -> db -> get("role_administrateur") -> result();
        foreach($datas as $role) {
            $role -> admins = $this -> db -> where('admin_role', $role -> radm_id)
                            -> get($this -> _table) -> result();
        }
        return $datas;
    }

}