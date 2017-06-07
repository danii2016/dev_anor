<?php
/**
 * Class name 	: Cadre_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-06-02
 */
class Cadre_m extends ANOR_Model{
   
	protected $_table = "cadre";
    protected $_pk = "cad_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
}
    