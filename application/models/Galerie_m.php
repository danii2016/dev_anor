<?php
/**
 * Class name 	: Galerie_m
 * author 		: Danielson Andriaritiana
 * mail 		: dandriaritiana@gmail.com
 * version 		: 1.0
 - create		: 20117-05-25
 */
class Galerie_m extends ANOR_Model{
   
	protected $_table = "galerie";
    protected $_pk = "gal_id";
	protected $_lang = "fr";
	
    public function __construct() {
        parent::__construct();
    }
    
    
}