<?php
/**
 * Class name 	: Procedure_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-06-11
 */
class Procedure_m extends ANOR_Model{
   
	protected $_table = "proc_procedure";
    protected $_pk = "pproc_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    public function get_procedures() {
        $procedures = $this -> db -> get($this -> _table) -> result();
        foreach($procedures as $proc) {
            $proc -> contenu = $this -> db -> where('pproc_id', $proc -> pproc_id) -> get('proc_contenu') -> result();
        }
        return $procedures;
    }
    
    public function get_foredit() {
        $procedures = $this -> db -> join('proc_procedure', 'proc_procedure.pproc_id = proc_contenu.pproc_id') -> get('proc_contenu') -> result();
        return $procedures;
    }
    
    public function get_rubriques() {
        $procedures = $this -> db -> get($this -> _table) -> result();
        return $procedures;
    }
    
    public function save_procedure($id, $idproc, $lang, $cont) {
        $infoproc = array('pproc_id' => $idproc,
                         'pcont_lang' => $lang,
                         'pcont_contenu' => $cont);
        if($id == "") {
            $exist = $this -> db -> where('pproc_id', $idproc) -> where('pcont_lang', $lang) -> get('proc_contenu') -> result_array();
            if(empty($exist)) {
                $res = $this -> db -> insert('proc_contenu', $infoproc);
                return array('status' => $res ? 1 : 0, 'message' => $res ? 'Procédure enregistrée' : 'Erreur lors de l\'enregistrement. Veuillez réessayer.');
            } else {
                return array('status' => 0, 'message' => 'Il y a une procédure enregistré à cette rubrique dans cette langue.<br> Procédez à la modification s\'il vous plait ou changez de langue.');
            }
        } else {
            $res = $this -> db -> where('pcont_id', $id) -> update('proc_contenu', $infoproc);
            return array('status' => $res ? 1 : 0, 'message' => $res ? 'Succès de la modification.' : 'Erreur lors de l\'enregistrement. Veuillez réessayer.');
        }
    }
    
    public function delete_procedure($id) {
        $res = $this -> db -> where('pcont_id', $id) -> delete('proc_contenu');
        return array('status' => $res ? 1 : 0, 'message' => $res ? 'Succès de la suppression.' : 'Erreur lors de la suppression. Veuillez réessayer.');
    } 
}