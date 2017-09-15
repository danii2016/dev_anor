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
    
    public function get_admins_foredit() {
        $datas = $this -> db -> join("role_administrateur",'role_administrateur.radm_id = administrateur.admin_role')
                            -> get($this -> _table) -> result();
        return $datas;
    }
    
    public function get_roles() {
        $datas = $this -> db -> get("role_administrateur") -> result();
        return $datas;
    }
    
    public function save_admin($id, $titre, $civilite, $nom, $prenom) {
        $info_admin = array('admin_role' => $titre,
                            'admin_civilite' => $civilite,
                            'admin_nom' => $nom,
                            'admin_prenom' => $prenom);
        if($id == "") {
            $res = $this -> db -> insert('administrateur', $info_admin);
        } else {
            $res = $this -> db -> where('admin_id', $id) -> update('administrateur', $info_admin);
        }
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistrement reussie' : 'Echec de l\'enregistrement. Veuillez réessayer');
    }

        
    public function delete_admin($id) {
        $res = $this -> db -> where('admin_id', $id) -> delete('administrateur');
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Suppression reussie.' : 'Echec de la suppression. Veuillez réessayer');
    }
}