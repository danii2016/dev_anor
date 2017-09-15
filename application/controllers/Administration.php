<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends ANOR_Controller {

    protected $_JS = array("admin-script.js","lumino.glyphs.js","ckeditor/ckeditor.js","moment.min.js","bootstrap-datetimepicker.min.js","par_page.js");
	protected $_CSS = array("admin-styles.css","datepicker3.css","bootstrap-datetimepicker.min.css","animation.css", "global.css");
    
    protected $_ESPACE="administrateur/";
    protected $_VIEWDIR = "administrateur";
    
    protected $_MODELS = array("uti_utilisateur_m","a_propos_m","accueil_m","actualite_m","administrateur_m","cadre_m","galerie_m","lien_m","procedure_m", "statistique_m", "uti_utilisateur_m");
    
    protected $_PROTEGER = TRUE;
    
    public function __construct() {
		parent::__construct(); 
    }
    
	public function index() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $this->loadData('page_admin', 'accueil');
		$this->loadPage('accueil');
	}
    
    public function gerer_accueil() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $info = $this -> accueil_m -> get_accueil();
        $this->loadData('page_admin', 'accueil');
        $this->loadData('info', $info);
		$this->loadPage('accueil_site');
    }
    
    public function sauver_accueil() {
        if($_POST) {
            extract($_POST) ;
            $config = array();
            $config['upload_path'] = APPPATH.'../assets/image/pictures'; //give the path to upload the image in folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '0';
            $config['overwrite'] = FALSE;
            $fichier = "";
            if($_FILES) {
                $this -> load -> library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('fichier')){  
                    $error[] = ['error' => $this->upload->display_errors()];
                } else {
                    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $fichier = $upload_data['file_name'];
                }
            }
            if(isset($error)) {
                var_dump($error);
                echo json_encode(array('status' => 0, 'message' => 'Upload de fichier interrompu. Veuiller réessayer'));
            } else {
                $res  = $this -> accueil_m -> update_accueil($titre, $contenu, $fichier);
                echo json_encode(array('status' => $res ? 1 : 0, 
                                        'message' => $res ? 'Succès' : 'Erreur de l\'enregistrement veuillez réessayer.'));
            }
            
        }
    }
    
    public function gerer_propos() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $propos = $this -> a_propos_m -> get_propos();
        $this->loadData('page_admin', 'propos');
        $this->loadData('info', $propos);
		$this->loadPage('propos');
    }
    
    public function sauver_propos() {
        if($_POST) {
            extract($_POST);
            $config = array();
            $config['upload_path'] = APPPATH.'../assets/image'; //give the path to upload the image in folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '0';
            $config['overwrite'] = FALSE;
            $ficaccueil = "";
            $ficorg = "";
            
            if($_FILES) {
                $this -> load -> library('upload');
                $this->upload->initialize($config);
                if(isset($_FILES['fichieraccueil'])) {
                    if (!$this->upload->do_upload('fichieraccueil')){  
                        $error[] = ['error' => $this->upload->display_errors()];
                    } else {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $ficaccueil = $upload_data['file_name'];
                    }
                }
                if(isset($_FILES['fichierorganigramme'])) {
                    if (!$this->upload->do_upload('fichierorganigramme')){  
                        $error[] = ['error' => $this->upload->display_errors()];
                    } else {
                        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                        $ficorg = $upload_data['file_name'];
                    }
                }
            }
            if(isset($error)) {
                var_dump($error);
                echo json_encode(array('status' => 0, 'message' => 'Upload de fichier interrompu. Veuiller réessayer'));
            } else {
                $res = $this -> a_propos_m -> update_propos($titre_org, $contenu, $ficaccueil, $ficorg);
                echo json_encode(array('status' => $res ? 1 : 0, 
                                    'message' => $res ? 'Succès' : 'Erreur de l\'enregistrement veuillez réessayer.'));
            }
        }
    }
    
    public function gerer_administrateur() {
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $admins = $this -> administrateur_m -> get_admins_foredit();
        $roles = $this -> administrateur_m -> get_roles();
        $this->loadData('page_admin', 'admin');
        $this->loadData('administrateurs', $admins);
        $this->loadData('roles', $roles);
		$this->loadPage('administrateur');
    }
    
    public function deconnexion() {
        $this -> session -> userdata['session_admin_anor'] = null;
        redirect('administration');
    }
    
    public function identification() {
        $this->loadData('authentify', true);
        $this->loadPage('com/_identification');
        //$res = $this -> uti_utilisateur_m -> save_user("1", "admin", "admin319");
    } 
    
    public function authentifier() {
        $login = $this -> input -> post('login');
        $pwd = $this -> input -> post('pass');
        $res = $this -> uti_utilisateur_m -> authentifie($login, $pwd);
        if($res['status']) {
            $this -> session -> userdata['session_admin_anor'] = $res['user'];
        }
        echo json_encode($res); 
    }
    
    /**Gestion des actualités */
    public function gerer_actualite(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $this-> _CSS[] = "par_page.css";
        $actus = $this -> actualite_m -> get_actualitesavecarticles(); 
        $this->loadData('actualites', $actus);
        $this->loadData('page_admin', 'actualite');
        $this->loadPage('actualite');
    }
    
    public function get_detailactualite($id = null) {
        if(!isset($id)) {
            echo 'Erreur : Vous devez ajouter un identifiant d\'article';
        } else {
            $data = $this -> actualite_m -> get_infoactualites($id); 
            echo json_encode($data);
        }
    }
    
    public function sauver_actualite() {
        $idactu = $this->input->post('id');
        $titreactu = $this->input->post('titre');
        $dateactu = $this->input->post('date');
        $articles = $this->input->post('articles');
        $res = $this-> actualite_m -> save_actu($idactu, $titreactu, $dateactu, $articles);
        echo json_encode($res);
    }
    
    public function supprimer_actualite($id) {
        $res = $this-> actualite_m -> delete_actu($id);
        echo json_encode($res);
    }
    
    public function supprimer_article($id) {
        $res = $this-> actualite_m -> delete_article($id);
        echo json_encode($res);
    }
    
    /** Gestion des galeries photos */
    public function gerer_galerie(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $this-> _CSS[] = "par_page.css";
        $galeries = $this -> galerie_m -> get_galeries(); 
        $repertoires = glob(APPPATH.'../assets/image/galerie/*');
        $this->loadData('repertoires', $repertoires);
        $this->loadData('galeries', $galeries);
        $this->loadData('page_admin', 'galerie');
        $this->loadPage('galerie');
    }
    
    public function sauver_galerie() {
        if($_POST) {
            extract($_POST);
            $res = $this -> galerie_m -> save_galerie($id, $rep, $lib, $img); 
            echo json_encode($res);
        }
    }
    
    public function supprimer_galerie($id) {
        $res = $this -> galerie_m -> delete_galerie($id); 
        echo json_encode($res);
    }
    
    /*Gestion des procédures */    
    public function gerer_procedure(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $process = $this -> procedure_m -> get_foredit(); 
        $rubs = $this -> procedure_m -> get_rubriques(); 
        $this->loadData('rubriques', $rubs);
        $this->loadData('procedures', $process);
        $this->loadData('page_admin', 'procedure');
        $this->loadPage('procedure');
    }
    
    public function sauver_procedure() {
        if($_POST) {
            extract($_POST);
            $res = $this -> procedure_m -> save_procedure($id, $idproced, $langage, $contenu);
            echo json_encode($res);
        }
    }
    
    public function supprimer_procedure($id) {
        $res = $this -> procedure_m -> delete_procedure($id); 
        echo json_encode($res);
    }
    
    //Gestion des statistiques
    public function gerer_statistique(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $stats = $this -> statistique_m -> get(); 
        $this->loadData('statistiques', $stats);
        $this->loadData('page_admin', 'statistique');
        $this->loadPage('statistique');
    }    
    
    public function save_annee() {
        if($_POST) {
            extract($_POST);
            $res = $this -> statistique_m -> save_annee($id, $folder, $nom); 
            echo json_encode($res);
        }
    }
    
    public function get_contenustat() {
        if($_POST) {
            extract($_POST);
            $fichiers = array_map('basename',glob(APPPATH.'../assets/documents/statistiques/'.$repertoire.'/*'));
            $this->loadData('repertoire', $repertoire);
            $this->loadData('fichiers', $fichiers);
            $this->loadPageAjax('liste_image');
        }
    }
    
    public function uploader_statistique() {
        if($_POST) {
            extract($_POST);
            //configuration de l'upload
            $config = array();
            $config['upload_path'] = APPPATH.'../assets/documents/statistiques/'.$repertoire; //give the path to upload the image in folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '0';
            $config['overwrite'] = FALSE;
            //Chargement de la librairie
            $this->load->library('upload');
            //Initialisation des données à traiter
            $files = $_FILES;
            $cpt = count($_FILES);
            $error = array();
            for($i=0; $i < $cpt; $i++) {           
                $_FILES['files'] =  $files[$i];
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('files')){  
                    $error[] = ['error' => $this->upload->display_errors()];
                }
            }
            if(empty($error)) {
                echo json_encode(array('status' => 1, 'message' => 'FIchier(s) uploadé(s) avec succès'));
            } else {
                echo json_encode(array('status' => 0, 'message' => 'Des erreurs ont été rencontrés lors de l\'upload. Veuillez réessayer', 'erreurs' => $error));
            }
        }
    }
    
    public function supprimer_dossierstatistique() {
        if($_POST) {
            extract($_POST);
            $res = $this -> statistique_m -> supprimer_annee($id, $repertoire); 
            echo json_encode($res);
        }
    }
    
    //Gestion des cadres légal
    public function gerer_cadre_legal(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $this-> _CSS[] = "par_page.css";
        $cadres = $this -> cadre_m -> get(); 
        $this->loadData('rubriques', $cadres);
        $this->loadData('page_admin', 'cadre_legal');
        $this->loadPage('cadre_legal');
    }   
    
    public function uploader_cadre() {
        if($_POST) {
            extract($_POST);
            //configuration de l'upload
            $config = array();
            $config['upload_path'] = APPPATH.'../assets/documents/cadres/'.$repertoire; //give the path to upload the image in folder
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['overwrite'] = FALSE;
            //Chargement de la librairie
            $this->load->library('upload');
            //Initialisation des données à traiter
            $files = $_FILES;
            $cpt = count($_FILES);
            $error = array();
            for($i=0; $i < $cpt; $i++) {           
                $_FILES['files'] =  $files[$i];
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('files')){  
                    $error[] = ['error' => $this->upload->display_errors()];
                }
            }
            if(empty($error)) {
                echo json_encode(array('status' => 1, 'message' => 'FIchier(s) uploadé(s) avec succès'));
            } else {
                echo json_encode(array('status' => 0, 'message' => 'Des erreurs ont été rencontrés lors de l\'upload. Veuillez réessayer', 'erreurs' => $error));
            }
        }
    }
    
    public function supprimer_fichier() {
        if($_POST) {
            extract($_POST);
            $fichier = APPPATH.'../assets/'.$repertoire.'/'.trim($nom);
            $res = @unlink($fichier);
            echo json_encode( array('status' => $res ? 1 : 0, 'message' => 'Erreur de suppression du fichier. Veuillez réessayer ou supprimer le fichier manuellement.'));
        }
    }
    
    public function get_contenurepertoire() {
        if($_POST) {
            extract($_POST);
            $fichiers = array_map('basename',glob(APPPATH.'../assets/documents/cadres/'.$repertoire.'/*'));
            $this->loadData('fichiers', $fichiers);
            $this->loadPageAjax('liste_fichier');
        }
    }
    
    //Gestion des comptoirs
    public function gerer_comptoir(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $this-> _CSS[] = "par_page.css";
        $comptoirs = $this -> lien_m -> get_comptoirs(); 
        $this->loadData('comptoirs', $comptoirs);
        $this->loadData('page_admin', 'comptoir');
        $this->loadPage('comptoir');
    }   
    
    public function sauver_comptoir() {
        if($_POST) {
            extract($_POST);
            $res = $this -> lien_m -> save_comptoir($id, $libelle); 
            echo json_encode($res);
        }
    }
    
    public function supprimer_comptoir() {
        if($_POST) {
            extract($_POST);
            $res = $this -> lien_m -> delete_comptoir($id); 
            echo json_encode($res);
        }
    }
    
    //Gestion des liens des collaborateurs
    public function gerer_lien(){
        if($this->_PROTEGER && !isset($this -> session -> userdata['session_admin_anor'])) {
			redirect('administration/identification');
		}
        $liens = $this -> lien_m -> get(); 
        $this->loadData('liens', $liens);
        $this->loadData('page_admin', 'lien');
        $this->loadPage('lien');
    }
    
    public function sauver_lien() {
        if($_POST) {
            extract($_POST);
            //configuration de l'upload
            $config = array();
            $config['upload_path'] = APPPATH.'../assets/image/logos_collab'; //give the path to upload the image in folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '0';
            $config['overwrite'] = FALSE;
            $ficname = "";
            
            if($_FILES) {
                $this -> load -> library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('fichier')){  
                    $error[] = ['error' => $this->upload->display_errors()];
                } else {
                    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $ficname = $upload_data['file_name'];
                }
            }
            
            $res = $this -> lien_m -> save_link($id, $nom, $url, $ficname);
            echo json_encode($res);
        }
    }
    
    public function supprimer_lien() {
        if($_POST) {
            extract($_POST);
            $res = $this -> lien_m -> delete_link($id);
            echo json_encode($res);
        }
    }
    
    public function sauver_profil() {
        if($_POST) {
            extract($_POST);
            $res = $this -> uti_utilisateur_m -> save_profil($id, $login, $pass, $newpass);
            echo json_encode($res);
        }
    }
    
    public function sauver_administrateur() {
        if($_POST) {
            extract($_POST);
            $res = $this -> administrateur_m -> save_admin($id, $titre, $civ, $nom, $prenom);
            echo json_encode($res);
        }
    }
    
    public function supprimer_administrateur() {
        if($_POST) {
            extract($_POST);
            $res = $this -> administrateur_m -> delete_admin($id);
            echo json_encode($res);
        }
    }
}