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
    
    public function save_galerie($id_gal, $directory, $libelle, $imagename) {
        //$tmp = explode('.', $imagename);
        $extension = substr($imagename, strrpos($imagename,'.') + 1);
        $imageok = false;
        $contents = glob(APPPATH.'../assets/image/galerie/'.$directory.'/*'); 
        if(empty($contents)) {
            return array('status' => 0, 'message' => 'Opération annulée, le répertoire est vide');
        } else {
            if($extension != $imagename) {
                if(realpath(APPPATH.'../assets/image/galerie/'.$directory.'/'.$imagename)) {
                    $imageok = true;
                } else {
                    foreach($contents as $img) {
                        if(strpos(basename($img), $imagename) != false) {
                            $imagename = basename($img);
                            $imageok = true;
                        }
                    }
                }
            } else {
                foreach($contents as $img) {
                    //var_dump(strpos(basename($img), $imagename) );
                    if(strpos(basename($img), $imagename) === 0) {
                        $imagename = basename($img);
                        //var_dump($imagename);
                        $imageok = true;
                    }
                }
            }
            
            if(!$imageok) {
                $imagename = basename($contents[0]);
            }
            $info = array('gal_repertoire' => $directory, 
                              'gal_libelle' => $libelle,
                              'gal_imagemenu' => $imagename);
            if($id_gal == "") {
                $res = $this -> db -> insert($this -> _table, $info);
            } else {
                $res = $this -> db -> where('gal_id', $id_gal) -> update($this -> _table, $info);
            }
            
            return array('status' => $res ? 1 : 0 , 'message' => $res ? 'Succès de l\'enregisrtement' : 'Echec de l\'enregistrement. Veuillez réessayer ');
        }
    }
    
    public function delete_galerie($id) {
        $res = $this -> db -> where('gal_id', $id) -> delete($this -> _table);
        return array('status' => $res ? 1 : 0 , 'message' => $res ? 'Succès de la suppression' : 'Echec de la suppression. Veuillez réessayer ');
    }
    
    private function generate_thumbs($photo) {
        if(isset($photo->gal_imagemenu) && $photo->gal_imagemenu != "") {
            if(realpath(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/'.$photo->gal_imagemenu) && !realpath(APPPATH.'../assets/image/galerie/'.$photo ->gal_repertoire.'/thumbs/'.$photo->gal_imagemenu)) {
                $ext = substr($photo->gal_imagemenu, strrpos($photo->gal_imagemenu,'.') + 1);
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
                                    
                    
                if(isset($imagetemp) && $imagetemp) {

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