<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class C_Membre extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->view('header');
		$this->load->view('footer');
		$this->load->database();
	}
	public function index() {
		
		$this->load->view('index');
	}

	public function inscription() {

		$this->load->helper('security');

		$this->load->model('BD_Membre');


		$this->form_validation->set_rules('login','login','trim|required|xss_clean|is_unique[Membre.login]');
		$this->form_validation->set_rules('nom','nom','required|xss_clean');
		$this->form_validation->set_rules('prenom','prenom','required|xss_clean');
		$this->form_validation->set_rules('email','email','trim|required|xss_clean|valid_email|is_unique[Membre.email]');
		$this->form_validation->set_rules('sexe','sexe','required|xss_clean');
		$this->form_validation->set_rules('mdp','mdp','required|xss_clean');
		$this->form_validation->set_rules('avatar','avatar','trim|xss_clean');

		$config['upload_path']          = './images/avatar/';
		$config['allowed_types']        = 'gif|jpg|png|mov';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['max_filename']         = 100;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if($this->form_validation->run() == FALSE) {
			$this->load->view('index');
		}else{

			$login=$this->input->post('login');
			$nom=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$email=$this->input->post('email');
			$sexe=$this->input->post('sexe');
			$mdp=$this->input->post('mdp');
			$avatar=$this->input->post('avatar');

			$up = $this->upload->do_upload('avatar');


			if(!$up) {
				$avatar="avatar_default.gif";
			}
			else{
				$avatar=$_FILES['avatar']['name'];
				$donnees=array('login'=>$login,'nom'=>$nom,'prenom'=>$prenom,'email'=>$email, 'sexe'=>$sexe, 'avatar'=>$avatar);

				if($this->BD_Membre->nvMembre($mdp,$donnees)){
					$this->load->view('succesInscription');
				}
				
			}
		}

	}

	
}

