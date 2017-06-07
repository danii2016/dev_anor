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
    
    
}