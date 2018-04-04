<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class C_Equipe extends CI_Controller {

  private $err=array();

  function __construct() {
    parent::__construct();

    if (!$this->session->userdata('login')) {
      redirect('C_Membre/inscription','refresh');
    }

    $this->load->library('form_validation');
    $this->load->helper('security');

    $this->load->view('headerco');
    $this->load->view('footer');

  }

  public function index() {

    $this->load->view('creerequipe');

  } 

  public function creerEquipe() {

    $this->load->database();

    $login = $this->session->userdata('login');

    $this->form_validation->set_rules('nom','nom','trim|required|xss_clean|is_unique[Equipe.nom]');
    $this->form_validation->set_rules('mdp','mdp','required|xss_clean');
    $this->form_validation->set_rules('sport','sport','required|xss_clean');
    $this->form_validation->set_rules('ville','ville','required|xss_clean');
    $this->form_validation->set_rules('description','description','xss_clean');
    $this->form_validation->set_radio('sexe', 'sexe', 'required|xss_clean');
    $this->form_validation->set_rules('logo','logo','trim|xss_clean');

    $config['upload_path']          = './images/avatar/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 0;
    $config['max_width']            = 0;
    $config['max_height']           = 0;
    $config['max_filename']         = 100;

    $this->load->library('upload');
    $this->upload->initialize($config);

    $login = $this->session->userdata('login');


       $this->load->model('BD_Equipe');
      $var = $this->BD_Equipe->verifyTotalEquipe($login);
      if ($var == true) {
       $this->load->view('equipeFail');
      } else {

    if($this->form_validation->run() == FALSE) {
      $this->load->view('creerequipe');
    } else {
       $nom=$this->input->post('nom');
    $mdp=$this->input->post('mdp');
    $sport=$this->input->post('sport');
    $ville=$this->input->post('ville');
    $description=$this->input->post('description');
    $sexe=$this->input->post('sexe');
    $logo=$this->input->post('logo');
        $up = $this->upload->do_upload('logo');
        
      if(!$up) {
        $logo="avatar_default.gif";
      }else {
       $logo=$_FILES['logo']['name'];
     }

        $donnees=array('nom'=>$nom,'sport'=>$sport,'ville'=>$ville,'description'=>$description, 'logo'=>$logo, 'sexe'=>$sexe, 'admin'=>$login);
       $donnees2=array('nomequipe'=>$nom,'login'=>$login);

        $this->BD_Equipe->nvEquipe($mdp,$donnees,$login);
        $this->BD_Equipe->nvMembreEquipe($donnees2);
        $this->load->view('equipeok');
      }
      }
    }
  


  public function rejoindreEquipe() {

    $this->load->library('form_validation');
    $this->load->database();

    $this->load->model('BD_Equipe');
    $login = $this->session->userdata('login');
    $sexe = $this->session->userdata('sexe');
    $data = array();
    $result = $this->BD_Equipe->getEquipesSexe($login,$sexe);
    $result2 = $this->BD_Equipe->getEquipesMixte();
    $data['nom']=$result;
    $data['nom1']=$result2;


    $this->form_validation->set_rules('nom','nom','required|xss_clean');
    $this->form_validation->set_rules('mdp','mdp','required|xss_clean');

    $nom=$this->input->post('nom');
    $mdp=$this->input->post('mdp');


    $donnees=array('nomequipe'=>$nom,'login'=>$login,'entraineur'=>0);
    
    if($this->form_validation->run() == FALSE) {
     $this->load->view('rejoindreEquipe', $data);
   } else {
    $this->load->model('BD_Equipe');

    $var=$this->BD_Equipe->verify_Equipe($nom,$mdp);
    $var2=$this->BD_Equipe->verifyNvMembreEquipe($login, $nom);
  

    if ($var==true && $var2==false) {
      $this->BD_Equipe->nvMembreEquipe($donnees);
      $this->load->view('equipeRejoint');
    } else {
      $this->load->view('rejoindreEquipeFail', $data);
    }
  }
}

public function supprimerEquipe() {
    $this->load->library('form_validation');
    $this->load->database();

    $this->load->model('BD_Equipe');

    $data = array();
    $result = $this->BD_Equipe->getEquipesMixte();
    $data['nom']=$result;

    $this->form_validation->set_rules('nom','nom','required|xss_clean');
    $this->form_validation->set_rules('mdp','mdp','required|xss_clean');

    $nom=$this->input->post('nom');
    $mdp=$this->input->post('mdp');
    
    if($this->form_validation->run() == FALSE) {
     $this->load->view('gererEquipe', $data);
   } else {
    $this->load->model('BD_Equipe');

    $var=$this->BD_Equipe->verify_Equipe($nom,$mdp);


    if ($var==true) {
      $this->BD_Equipe->supprimerEquipe($nom);
      $this->load->view('equipeSupprimee');
    } else {
      $this->load->view('suppressionEquipeFail', $data);
    }
  }
}

public function quitterEquipe() {
    $this->load->library('form_validation');
    $this->load->database();
    $login = $this->session->userdata('login');

    $this->load->model('BD_Equipe');

    $data = array();
    $data['nomequipe'] = $this->BD_Equipe->getEquipesMembre($login);


    $this->form_validation->set_rules('nom','nom','required|xss_clean');

    $nom=$this->input->post('nom');
    
    if($this->form_validation->run() == FALSE) {
     $this->load->view('quitterEquipe', $data);
   } else {
    $this->load->model('BD_Equipe');

      $this->BD_Equipe->supprimerMembre($login);
      $this->load->view('equipeQuittee');
    }

  }


public function modifierEquipe() {
    $this->load->library('form_validation');
    $this->load->database();

    $this->load->model('BD_Equipe');

    $data = array();
    $result = $this->BD_Equipe->getEquipesMixte();
    $data['nom']=$result;

    $login = $this->session->userdata('login');

    $this->form_validation->set_rules('nom','nom','trim|xss_clean');
    $this->form_validation->set_rules('description','description','xss_clean');
    $this->form_validation->set_radio('sexe', 'sexe', 'xss_clean');
    $this->form_validation->set_rules('logo','logo','trim|xss_clean');

    $config['upload_path']          = './images/avatar/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 0;
    $config['max_width']            = 0;
    $config['max_height']           = 0;
    $config['max_filename']         = 100;

    $this->load->library('upload');
    $this->upload->initialize($config);

    $login = $this->session->userdata('login');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('gererEquipe');
    } else {
      $nom=$this->input->post('nom');
      $description=$this->input->post('description');
      $sexe=$this->input->post('sexe');
      $logo=$this->input->post('logo');
      $up = $this->upload->do_upload('logo');
        
      if($up) {

        $logo=$_FILES['logo']['name'];
      }
     

      $donnees=array('description'=>$description, 'logo'=>$logo, 'sexe'=>$sexe);

        $this->BD_Equipe->updateEquipe($donnees,$nom);
        $this->load->view('equipeUpdate');
      }
    }


public function designerEntraineur() {

  $this->load->library('form_validation');
  $this->load->database();

  $login = $this->session->userdata('login');
  $this->load->model('BD_Equipe');
  
  $data = array();
  $result = $this->BD_Equipe->getEquipeAdmin($login);
  $data['nom']=$result;

  $this->form_validation->set_rules('nom','nom','required|xss_clean');
  $this->form_validation->set_rules('membre','membre','required|xss_clean');

  $nomequipe=$this->input->post('nom');
  $membre=$this->input->post('membre');


  $donnees=array('entraineur'=>1);


  if($this->form_validation->run() == FALSE) {
   $this->load->view('gererEquipe', $data);

 } else {

  $this->load->model('BD_Equipe');
  $var=$this->BD_Equipe->verifyMembreEquipe($membre,$nomequipe);
  $var2=$this->BD_Equipe->isAdmin($login,$nomequipe);
    $var3=$this->BD_Equipe->isEntraineur($membre);

  if ($var==true && $var2==true && $var3==false) {
    $this->BD_Equipe->designerEntraineur($donnees, $membre, $nomequipe);
    $this->load->view('gererEquipe');
  } else {
    $this->load->view('designerEntraineurFail', $data);


  }
}
}

public function inviterMembre() {
  $this->load->library('form_validation');
  $this->load->database();

  $login = $this->session->userdata('login');


  $this->load->model('BD_Equipe');
    $this->load->model('BD_Membre');
  $data = array();
  $result = $this->BD_Equipe->getEquipeAdmin($login);
  $data['nom']=$result;

  $this->form_validation->set_rules('nom','nom','required|xss_clean');
  $this->form_validation->set_rules('membre','membre','required|xss_clean');

  $nom=$this->input->post('nom');
  $membre=$this->input->post('membre');

  $donnees=array('nomequipe'=>$nom,'login'=>$membre,);

  if($this->form_validation->run() == FALSE) {
   $this->load->view('inviter', $data);

 } else {


  $var=$this->BD_Equipe->verifyMembreEquipe($membre,$nom);
  $var2=$this->BD_Equipe->isAdmin($login,$nom);
  $var3=$this->BD_Membre->verifyMembre($membre);
// Peut inviter un membre d'un autre sexe

  if ($var==false && $var2==true && $var3==true) {
    $this->BD_Equipe->envoyerInvitation($donnees);
    $this->load->view('invitationEnvoyee');
  } else {
    $this->load->view('erreurInvitation', $data);
  }

}
}

public function creerEvent($year = null,$month = null,$day = null) {
  if(is_null($year) && is_null($month) && is_null($day)) {
    $this->session->unset_userdata('debut');
  }

  $this->load->library('form_validation');
  $this->load->database();

  $login = $this->session->userdata('login');
  $this->load->model('BD_Equipe');

  $data = array();
  $result = $this->BD_Equipe->getEquipeEntraineur($login);
  $data['nomequipe']=$result;


  if(is_null($year)) {
    $year=date('Y');
  }
  if(is_null($month)) {
    $month=date('m');
  }
  for($i=1;$i<32;$i++) {
    $date[$i]=base_url().'index.php/C_Equipe/creerEvent/'.$year.'/'.$month.'/'.$i;
  }

  $prefs = array(
    'show_next_prev'  => TRUE,
    'next_prev_url'   => base_url().'index.php/C_Equipe/creerEvent/'
    );
  $prefs['template'] = '

  {table_open}<table border="0" cellpadding="10" cellspacing="0">{/table_open}

  {heading_row_start}<tr >{/heading_row_start}

  {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
  {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
  {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

  {heading_row_end}</tr>{/heading_row_end}

  {week_row_start}<tr>{/week_row_start}
  {week_day_cell}<td>{week_day}</td>{/week_day_cell}
  {week_row_end}</tr>{/week_row_end}

  {cal_row_start}<tr>{/cal_row_start}
  {cal_cell_start}<td>{/cal_cell_start}
  {cal_cell_start_today}<td>{/cal_cell_start_today}
  {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

  {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
  {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

  {cal_cell_no_content}{day}{/cal_cell_no_content}
  {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

  {cal_cell_blank}&nbsp;{/cal_cell_blank}

  {cal_cell_other}{day}{/cal_cel_other}

  {cal_cell_end}</td>{/cal_cell_end}
  {cal_cell_end_today}</td>{/cal_cell_end_today}
  {cal_cell_end_other}</td>{/cal_cell_end_other}
  {cal_row_end}</tr>{/cal_row_end}

  {table_close}</table>{/table_close}
  ';

  $this->load->library('calendar', $prefs);
  $data['calendrier']=$this->calendar->generate($year, $month, $date);

  if(is_null($day) && !$this->session->has_userdata('debut')) {
    $data['debut']=FALSE;
    $data['fin']=FALSE;
  } else if(!$this->session->has_userdata('debut')){
    $data['debut']=$year.'-'.$month.'-'.$day;
    $this->session->set_userdata('debut',$data['debut']);
  } else {
    $data['debut']=$this->session->userdata('debut');
    $data['fin']=$year.'-'.$month.'-'.$day;
  }
  $this->form_validation->set_rules('nomequipe','nomequipe','required|xss_clean');
  $this->form_validation->set_rules('type','type','required|xss_clean');
  $this->form_validation->set_rules('debut','debut','required|xss_clean');
  $this->form_validation->set_rules('fin','fin','required|xss_clean');
  $this->form_validation->set_rules('periode','periode','xss_clean');
  $this->form_validation->set_rules('lieu','lieu','required|xss_clean');
  $this->form_validation->set_rules('description','description','required|xss_clean');

  $nomequipe=$this->input->post('nomequipe');
  $type=$this->input->post('type');
  $debut=$this->input->post('debut');
  $fin=$this->input->post('fin');
  $periode=$this->input->post('periode');
  $lieu=$this->input->post('lieu');
  $description=$this->input->post('description');

  $donnees=array('nomequipe'=>$nomequipe,'type'=>$type,'debut'=> $debut, 'fin'=>$fin,'periode'=>$periode,'lieu'=>$lieu,'description'=>$description);

  $var['entraineur']=$this->BD_Equipe->isEntraineur($login);

  if($var['entraineur'] == FALSE) {

    redirect('C_Profil/profil', $var);
  } else {
    if($this->form_validation->run() == FALSE ) {
     $this->load->view('creerevent', $data);

   } else {    
    $this->BD_Equipe->creerEvent($donnees);
    $this->load->view('eventOk');
      }
}
}

public function voirEvent() {
  $this->load->model('BD_Equipe');
  $login = $this->session->userdata('login');
  $data['info'] = $this->BD_Equipe->getEvent($login);

  $this->load->view('calendrier', $data);
}

public function voirEquipes() {
  $this->load->model('BD_Equipe');

  $data['info'] = $this->BD_Equipe->getEquipes();

  $this->load->view('equipes', $data);

}

public function presenceEvent($idEvent = null){
 $this->load->model('BD_Equipe');
 $login =$this->session->userdata('login');
  $this->session->has_userdata('idEvent');
 $this->load->helper('url');

  $idEvent=$this->uri->segment(3);

$data['nom'] = $this->BD_Equipe->getEvent2($idEvent);


$this->form_validation->set_rules('presence','presence','required|xss_clean');

 $presence = $this->input->post('presence');
 $idEvent = $this->input->post('idEvent');

 $donnees=array('idEvent'=>$idEvent, 'login'=> $login, 'presence'=>$presence);
 

 if($this->form_validation->run() == FALSE ) {
     $this->load->view('presenceevent',$data);

   } else { 

    $var=$this->BD_Equipe->verifyPresenceMembre($login,$idEvent);

    if($var == false) {

   $donnees=array('idEvent'=>$idEvent, 'login'=> $login, 'presence'=>$presence);
   $this->BD_Equipe->presenceEvent($donnees);
   redirect('C_Profil/profil');

 } else {
   $this->load->model('BD_Equipe');
  $login = $this->session->userdata('login');
  $data['info'] = $this->BD_Equipe->getEvent($login);

      $this->load->view("presenceEventFail", $data);
    }
  }
}

public function listePresenceEvent($idEvent){
  $this->load->model('BD_Equipe');
  $this->session->has_userdata('idEvent');
  $idEvent=$this->uri->segment(3);

  $data['membre'] = $this->BD_Equipe->getListePresence($idEvent);

  $this->load->view('listePresenceEvent', $data);


}

public function profilEquipe() {

    $nom=$this->uri->segment(3);
    $this->load->model('BD_Equipe');
    $data['info'] = $this->BD_Equipe->getEquipes2($nom);
    $data['membre'] = $this->BD_Equipe->getMembreEquipe($nom);
    $data['entraineur'] = $this->BD_Equipe->getEntraineur($nom);

    $this->load->view('profilEquipe', $data);
  }

}

