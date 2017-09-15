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
    
    public function get_comptoirs() {
        return $this -> db -> get('comptoir') -> result();
    }
    
    public function save_comptoir($id, $lib) {
        $info = array('cptr_libelle' => $lib);
        if($id == "") {
            $res =  $this -> db -> insert('comptoir', $info);
        } else {
            $res =  $this -> db -> where('cptr_id', $id) -> update('comptoir', $info);
        }
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistrement reussie' : 'Echec de l\'enregistrement. Veuillez réessayer');
    }
    
    public function delete_comptoir($id) {
        $res = $this -> db -> where('cptr_id', $id) -> delete('comptoir');
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Suppression reussie.' : 'Echec de la suppression. Veuillez réessayer');
    }
    
    public function save_link($id, $nom, $url, $image) {
        $info = array('colb_nom' => $nom,'colb_url' => $url,'colb_logo' => $image );
        if($id == "") {
            $res =  $this -> db -> insert('collaborateur', $info);
        } else {
            $colab = $this -> db -> where('colb_id', $id) -> get('collaborateur') -> row();
            if($colab -> colb_logo != "") {
                @unlink(APPPATH.'../assets/image/logos_collab/'.$colab -> colb_logo);
            }
            $res = $this -> db -> where('colb_id', $id) -> update('collaborateur', $info);
        }
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistrement reussie' : 'Echec de l\'enregistrement. Veuillez réessayer');
    }
    
    public function delete_link($id) {
        $colab = $this -> db -> where('colb_id', $id) -> get('collaborateur') -> row();
        if($colab -> colb_logo != "") {
            @unlink(APPPATH.'../assets/image/logos_collab/'.$colab -> colb_logo);
        }
        $res = $this -> db -> where('colb_id', $id) -> delete('collaborateur');
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Suppression reussie.' : 'Echec de la suppression. Veuillez réessayer');
    }
}