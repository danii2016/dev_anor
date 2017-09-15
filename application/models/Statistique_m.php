<?php
/**
 * Class name 	: Statistique_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-06-07
 */
class Statistique_m extends ANOR_Model{
   
	protected $_table = "statistique";
    protected $_pk = "stat_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function save_annee($id, $rep, $annee) {
        if(!is_dir(APPPATH.'../assets/documents/statistiques/'.$rep)) {
            mkdir(APPPATH.'../assets/documents/statistiques/'.$rep, 0777);
        }
        $info_stat = array('stat_annee' => $annee, 'stat_repertoire' => $rep);
        if($id == "") {
            $res = $this -> db -> insert('statistique', $info_stat);
        } else {
            $res = $this -> db -> where('stat_id', $id) -> update('statistique', $info_stat);
        }
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Enregistrement reussie' : 'Echec de l\'enregistrement. Veuillez réessayer');
    }
    
    public function supprimer_annee($id, $folder = null) {
        $err = false;
        $message = "Suppression réussie";
        $res = $this -> db -> where('stat_id', $id) -> delete('statistique');
        if(isset($folder) && $res) {
            $this -> vider_repertoire(APPPATH.'/assets/documents/statistiques/'.$folder);
            if(!@unlink(APPPATH.'/assets/documents/statistiques/'.$folder)) {
                $err = true;
                $message = "Impossible de supprimer le répertoire";
            }
        }
        
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Suppression reussie.'.($err ? ". ".$message : "") : 'Echec de la suppression. Veuillez réessayer');
    }
    
    private function vider_repertoire($rep) {
        $docs = glob($rep.'/*');
        foreach($docs as $fic) {
            if(is_dir($fic)) {
                $this -> vider_repertoire($fic);
            } else {
                @unlink($fic);
            }
        }
    }
}