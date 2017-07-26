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
}