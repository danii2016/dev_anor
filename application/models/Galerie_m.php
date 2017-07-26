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
    
    public function get_galeries() {
        $photos = $this -> db -> get($this -> _table) -> result();
        foreach($photos as $photo) {
            $this -> generate_thumbs($photo);
        }
        return $photos;
    }
    
    private function generate_thumbs($photo) {
        if(isset($photo->gal_imagemenu) && $photo->gal_imagemenu != "") {
            if(realpath(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu) && !realpath(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu)) {
                $tmp = explode('.',$photo->gal_imagemenu);
                $ext = $tmp[sizeof($tmp) - 1];
                switch(strtolower($ext)) {
                    case 'jpg' : $imagetemp = @imagecreatefromjpeg(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); 
                        break;
                    case 'jpeg' : $imagetemp = @imagecreatefromjpeg(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); 
                        break;
                    case 'gif' : $imagetemp = @imagecreatefromgif(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); 
                        break;
                    case 'png' : $imagetemp = @imagecreatefrompng(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); 
                        break;
                    case 'bmp' : $imagetemp = @imagecreatefrombmp(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu); 
                        break;
                    default: 
                        break;
                }
                                    
                    
                if($imagetemp) {

                    $taille = getimagesize(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu);
                    $ImageNew = imagecreatetruecolor(180, 100);
                    imagecopyresampled($ImageNew, $imagetemp, 0, 0, 0, 0, 180, 100, $taille[0], $taille[1]);
                    if(!is_dir(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs')){
                        $oldmask = umask(0);
                        mkdir(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs', 0777);
                    }
                    chmod(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs', 0777);
                    switch(strtolower($ext)) {
                        case 'jpg' : imagejpeg($ImageNew, APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu, 100); 
                            break; 
                        case 'jpeg' : imagejpeg($ImageNew, APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu, 100); 
                            break; 
                        case 'gif' : imagegif($ImageNew, APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu, 100); 
                            break; 
                        case 'png' : imagepng($ImageNew, APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu, 9); 
                            break; 
                        case 'bmp' : imagebmp($ImageNew, APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu, 100); 
                            break; 
                    }
                    imagedestroy($ImageNew);
                    imagedestroy($imagetemp);
                }
            }
        }
    }
}