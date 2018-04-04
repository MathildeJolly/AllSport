<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class BD_Membre extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function nvMembre($mdp,$donnees) {
		$mdp_hash=sha1($mdp);
		$this->db->set('mdp',$mdp_hash);
		return $this->db->insert('Membre', $donnees);
	}
	
	 public function verify_user($login, $mdp) {
      $q = $this
            ->db
            ->select('*')
            ->from('Membre')
            ->where('login', $login)
            ->where('mdp', sha1($mdp));

         $q=$q->get();

         if ( $q->num_rows() > 0 ) {
            $row = $q->row();
            $id = $row->id;
            $login = $row->login;
            $nom = $row->nom;
            $sexe = $row->sexe;
            $prenom = $row->prenom;
            $email = $row->email;
            $avatar = $row->avatar;
            $donnees = array(
               'id'=>$id,
               'login'=>$login,
               'sexe'=>$sexe,
               'nom'=>$nom,
               'prenom'=>$prenom,
               'email'=>$email,
               'avatar'=>$avatar
               );
            
            $this->session->set_userdata($donnees); // variable de session
            return true;
         }
         else{
         	return false;
     }
   }

   public function verifyMembre($membre) {
         $q= $this->db
      ->select('*')
      ->from('Membre')
      ->where('login',$membre);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }
   

   public function getDataMembre($login) {
      
      return $this->db->select('*')
      ->from('Membre')
      ->where('login', $login)
      ->get()->result_array(); 
   }

   public function getInvitationMembre($login) {
      return $this->db->select('*')
      ->from('Invitation')
      ->where('login', $login)
      ->get()->result_array(); 


      $q= $this->db
      ->select('*')
      ->from('Invitation')
      ->where('login',$login);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function supprimerInvitation($login,$nomequipe) {
      $this->db->where('login', $login)
      ->where('nomequipe',$nomequipe)->delete('Invitation');
      
   }

   public function getMembres() {
      return $this->db->select('*')
      ->from('Membre')
      ->get()->result_array(); 
   }

   public function editerMembre($donnees,$login) {
  
      $this->db->from('Membre')->where('login', $login);
      return $this->db->update('Membre', $donnees);
   }
   
   public function adminEquipe($login) {
       return $this->db->select('`nom`','admin')
      ->from('Equipe')
      ->where('admin', $login)
      ->get()->result_array(); 
   }

   public function entraineurEquipe($login) {
      return $this->db->select('*')
      ->from('Membre_equipe')
      ->where('login', $login)
      ->where('entraineur', 1)
      ->get()->result_array();
   }


}

