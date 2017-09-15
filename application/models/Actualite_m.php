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
    
    public function get_actualitesavecarticles() {
        $actus = $this -> db -> get($this -> _table) -> result();
        if(!empty($actus)) {
            foreach($actus as $actu) {
                $actu -> articles = $this -> db -> where('aact_id', $actu -> aact_id) -> get('actu_article') -> result();
            }
        }
        return $actus;
    }
    
    public function delete_actu($idactu) {
        $res = $this -> db -> where('aact_id', $idactu) -> delete('actu_article');
        if($res) {
            $rs = $this -> db -> where('aact_id', $idactu) -> delete('actu_actualite');
            return array('status' => $rs ? 1 : 0, 'message' => $rs ? 'Suppression effectuée' : 'Echec de la suppression de l\'actualité. Veuillez réessayer');
        } else {
            return array('status' => 0, 'message' => 'Certains articles attachés n\'ont pas été supprimé. Veuillez réessayer');
        }
    }
    
    public function delete_article($id) {
        $res = $this -> db -> where('aart_id', $id) -> delete('actu_article');
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Suppression effectuée' : 'Echec de la suppression de l\'actualité. Veuillez réessayer');
    }
    
    public function save_actu($id, $titre, $date, $articles) {
        $now = new DateTime('NOW');
        $infoactu = array('aact_titre' => $titre,
                            'aact_dateajout' => $this->reverse($date),
                            'aact_datemodification' => $now -> format('Y-m-d'));
        if($id == "") {
            $res = $this -> db -> insert('actu_actualite', $infoactu);
            $id = $this->db->insert_id();
        } else {
            $res = $this -> db -> where('aact_id', $id) -> update('actu_actualite', $infoactu);
        }
        
        if(!$res) {
            return array('status' => 0, 'message' => 'Erreur lors de l\'insertion de l\'article. Veuillez réessayer');
        } else {
            if(empty($articles)) {
                $this -> db -> where('aact_id', $id) -> delete('actu_actualite');
                return array('status' => 0, 'message' => 'Actualité supprimé. Aucun article');
            } else {
                $saved = true;
                foreach($articles as $art) {
                    $infoart = array('aact_id' => $id,
                                     'aart_titre' => $art['titre'],
                                     'aart_contenu' => $art['contenu']);
                    if($art['id'] == "") {
                        if(! $res = $this -> db -> insert('actu_article', $infoart)) {
                            $saved = false;
                        }
                    } else {
                        if(! $res = $this -> db -> where('aart_id', $art['id']) -> update('actu_article', $infoart)) {
                            $saved = false;
                        }
                    }
                }
                return array('status' => $saved ? 1 : 0, 'message' => $saved ? 'Enregistrement reussie' : 'Certains articles n\'ont pas été enregistré. Veuillez réessayer');
            }
        }
    }
}