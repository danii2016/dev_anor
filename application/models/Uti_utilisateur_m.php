<?php
/**
 * Class name 	: Uti_utilisateur_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-05-16
 */
class Uti_utilisateur_m extends ANOR_Model{
   
	protected $_table = "uti_utilisateur";
    protected $_pk = "pers_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function authentifie($login, $pass) {
        $res = $this -> db -> where('uti_login', $login) -> where('uti_mdp', sha1($pass."+")) -> get($this -> _table) -> row();
        return empty($res) ? array('status' => 0, 'message' => 'Login ou mot de passe incorrect', 'user' => array()) : array('status' => 1, 'message' => 'Authentifié', 'user' => $res);
    }
    
    public function save_user($type, $login, $pass, $id = null) {
        $pass = sha1($pass."+");
        $info_user = array('utype_id' => $type,
                          'uti_login' => $login,
                          'uti_mdp' => $pass);
        if(is_null($id)) {
            $res = $this -> db -> insert($this -> _table, $info_user);
        } else {
            $res = $this -> db -> where('uti_id', $id) -> update($this -> _table, $info_user);
        }
        return $res;
    }
    
    public function save_profil($id, $login, $pass, $newpass) {
        if($pass == "") {
            $info_user = array('uti_login' => $login);
            $res = $this -> db -> where('uti_id', $id) -> update($this -> _table, $info_user);
            return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistré avec succès' : 'Echec de la mise à jour. Veuillez réessayer');
        } else {
            $exist = $this -> db -> where('uti_id', $id) -> where('uti_mdp', sha1($pass."+")) -> get($this -> _table) -> result();
            if(empty($exist)) {
                return array('status' => 0, 'message' => 'Mot de passe incorrect');
            } else {
                $info_user = array('uti_login' => $login,
                                    'uti_mdp' => sha1($newpass.'+'));
                $res = $this -> db -> where('uti_id', $id) -> update($this -> _table, $info_user);
                return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistré avec succès' : 'Echec de la mise à jour. Veuillez réessayer');
            }
        }
    }
    
   /* public function update_accueil($title, $contenu, $lang = $this -> _lang) {
        $info_acc = array("acc_title" => $title,
                         "acc_content" => $contenu);
        return $this -> db -> where("acc_lang", $lang) -> update($this -> _table, $info_acc);
    }*/
    
}