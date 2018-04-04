<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class C_Session extends CI_Controller {

private $data=array();

    function __construct() {
      parent::__construct();
      $this->session->userdata('login');
      $this->load->library('form_validation');
      $this->load->view('header');
      $this->load->view('footer');

    }
  public function index() {
      $this->load->view('connexion');
  }

	public function connexion() {

    $this->data['erreur']='';
    $this->load->library('form_validation');
    $this->load->helper('security');
    $this->load->model('BD_Membre');

    $this->form_validation->set_rules('login','login','required|trim');
    $this->form_validation->set_rules('mdp','mdp','required|trim');

    $login = $this->input->post('login');
    $mdp = $this->input->post('mdp');


    if ($this->form_validation->run() == false)
    {
    	//$this->load->view('connexion');
    } else {
      $var=$this->BD_Membre->verify_user($login,$mdp);
       if ($var==true)
       {
        $this->session->set_userdata('login',$login);
        redirect('C_Profil/profil');

        
    } else  {
        echo "nul";
        
        $this->data['erreur']='Votre login ou votre mot de passe est incorrect. ';
    }
    
    }
    $this->load->view('connexion', $this->data);
  }

  public function deconnexion()
    {

    $this->session->sess_destroy();
     unset ($_SESSION);
    $this->load->view('succesDeconnexion');;
    }


}
