<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class C_Profil extends CI_Controller {
    function __construct() {
        parent::__construct();
         if (!$this->session->userdata('login')) {
          redirect('C_Membre/inscription','refresh');
          }
        $this->session->userdata('login');
        $this->load->view('headerco');
        $this->load->view('footer');
        $this->load->database();
        $this->load->library('form_validation');
    }
    public function index() {

        $this->load->view('profil');
    }
    public function profil() {

        $this->load->model('BD_Equipe');
        $this->load->model('BD_Membre');

        $login =  $this->session->userdata('login');

        $data['info'] = $this->BD_Membre->getDataMembre($login);
        $data['nomequipe'] = $this->BD_Equipe->getEquipesMembre($login);
        $data['admin'] = $this->BD_Membre->adminEquipe($login);
        $data['entraineurEquipe'] = $this->BD_Membre->entraineurEquipe($login);
        $data['entraineur']= $this->BD_Equipe->isEntraineur($login);
    $data['invitation'] = $this->BD_Membre->getInvitationMembre($login);
    
        $this->load->view('profil', $data);
    }

    public function editer() {

        $this->load->model('BD_Membre');


        $config['upload_path']          = './images/avatar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['max_filename']         = 40;

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->form_validation->set_rules('avatar','avatar','xss_clean');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('editerProfil');
        } else {
            $login=  $this->session->userdata('login');
            $up = $this->upload->do_upload('avatar');
            
            $avatar=$_FILES['avatar']['name'];
            $donnees=array('avatar'=>$avatar);

            if($this->BD_Membre->editerMembre($donnees,$login))
                redirect('C_Profil/profil');
        }
    }

    public function voirUtilisateur() {
    $this->load->model('BD_Membre');

    $data['info'] = $this->BD_Membre->getMembres();
    
    $this->load->view('membres', $data);
  }

  public function profilMembre($login) {
    $this->load->model('BD_Membre');
    $login=$this->uri->segment(3);
    $this->load->model('BD_Equipe');
    $data['info'] = $this->BD_Membre-> getDataMembre($login);
    $data['nomequipe'] = $this->BD_Equipe->getEquipesMembre($login);
    $data['admin'] = $this->BD_Membre->adminEquipe($login);
    $data['entraineurEquipe'] = $this->BD_Membre->entraineurEquipe($login);
    $data['entraineur']= $this->BD_Equipe->isEntraineur($login);


    $this->load->view('profilMembre', $data);
  }

  public function accepterInvitation($nomequipe) {
    $this->load->model('BD_Equipe');    
    $this->load->model('BD_Membre');

    $login = $this->session->userdata('login');
    $this->session->has_userdata('nomequipe');
     $nomequipe=$this->uri->segment(3);
    $donnees=array('nomequipe'=>$nomequipe,'login'=>$login,'entraineur'=>0);

    $this->BD_Equipe->nvMembreEquipe($donnees);
    $this->BD_Membre->supprimerInvitation($login,$nomequipe);
        redirect('C_Profil/profil');
  }

  public function refuserInvitation($nomequipe) {
        $this->load->model('BD_Equipe');    
    $this->load->model('BD_Membre');

    $login = $this->session->userdata('login');
    $this->session->has_userdata('nomequipe');

      $this->BD_Membre->supprimerInvitation($login,$nomequipe);
        redirect('C_Profil/profil');
}
}


