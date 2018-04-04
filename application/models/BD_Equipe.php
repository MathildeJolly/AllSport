<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class BD_Equipe extends CI_Model {

	public function __construct() {
		$this->load->database();
	}



   public function nvEquipe($mdp,$donnees) {
      $mdp_hash=sha1($mdp);
      $this->db->set('mdp',$mdp_hash);
      $this->db->insert('Equipe', $donnees);
   }

public function supprimerEquipe($nom) {
        $this->db->where('nom', $nom)->delete('Equipe');

}

public function supprimerMembre($login) {
     $this->db->where('login', $login)->delete('Membre_equipe');
}

public function updateEquipe($donnees,$nom) {

      $this->db->from('Equipe')->where('nom', $nom);
      return $this->db->update('Equipe', $donnees);
}

   public function verifyTotalEquipe($login) {
      $q= $this->db
      ->select('admin')
      ->from('Equipe')
      ->where('admin',$login);

      $q = $q->get();

      if ( $q->num_rows() == 5) {
         return true;
      } else {
         false;
      }
   }

   public function nvMembreEquipe($donnees) {   
      $this->db->insert('Membre_equipe', $donnees);
   }

   public function verify_Equipe($nom, $mdp) {
      $q = $this
      ->db
      ->select('*')
      ->from('Equipe')
      ->where('nom', $nom)
      ->where('mdp', sha1($mdp));

      $q=$q->get();

      if ( $q->num_rows() > 0 ) {
         return true;
      } else {
         return false;
      }
   }

   public function verifyNvMembreEquipe($login,$nom) {
      $q= $this->db
      ->select('login','nomequipe')
      ->from('Membre_equipe')
      ->where('login',$login)
      ->where('nomequipe',$nom);
      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function verifyMembreEquipe($membre,$nomequipe) {
      $q= $this->db
      ->select('login')
      ->from('Membre_equipe')
      ->where('login',$membre)
      ->where('nomequipe', $nomequipe);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }


   public function getEquipes() {
      return $this->db->select('*')
      ->from('Equipe')
     ->get()->result_array();
   }

   public function getEquipes2($nom) {
      return $this->db->select('*')
      ->from('Equipe')
      ->where('nom', $nom)
      ->get()->result_array();
   }

   public function getMembreEquipe($nom) {
       return $this->db->select('*')
      ->from('Membre_equipe')
      ->where('nomequipe', $nom)
      ->get()->result_array();
   }



   public function getEquipesMixte() {
      return $this->db->select('nom')
      ->from('Equipe')
      ->where('sexe', 0)
      ->get()->result_array();
   }
   

   public function getEquipesSexe($login,$sexe) {
      return $this->db->select('Equipe.nom')
      ->from('Equipe')
      ->join('Membre', 'Equipe.sexe=Membre.sexe')
      ->where('login', $login)
      ->where('Membre.sexe', $sexe)
      ->get()->result_array();
   }
   public function envoyerInvitation($donnees) {
       $this->db->insert('Invitation', $donnees);
   }

   public function getEvent($login) {
      return $this->db->select('*')
      ->from('Evenement')
      ->join('Membre_equipe','Evenement.nomequipe = Membre_equipe.nomequipe')
      ->where('login',$login)
      ->get()->result_array();
   }

   public function getEvent2($id) {
       return $this->db->select('*')
      ->from('Evenement')
      ->where('idEvent', $id)
      ->get()->result_array();
   }

   public function getEquipeAdmin($login) {
      return $this->db->select('nom')
      ->from('Equipe')
      ->where('admin', $login)
      ->get()->result_array();
   }

   public function getEquipeEntraineur($login) {
        return $this->db->select('nomequipe')
      ->from('Membre_equipe')
      ->where('login', $login)
      ->where('entraineur', 1)
      ->get()->result_array();
   }

   public function getEquipesMembre($login) {
      $q = $this->db
      ->select('nomequipe')
      ->from('Membre_equipe')
      ->where('login', $login);

      $q = $this->db->get();

      if ( $q->num_rows() > 0) {
         return $this->db
         ->select('nomequipe')
         ->from('Membre_equipe')
         ->where('login', $login)
         ->get()
         ->result_array();
      } else {
         return false;
      }
   }

   public function getEntraineur($nom){
        return $this->db->select('*')
      ->from('Membre_equipe')
      ->where('nomequipe', $nom)
      ->where('entraineur', 1)
      ->get()->result_array();
   }
   

   public function designerEntraineur($donnees,$login, $nomequipe) {
      $this->db->from('Membre_equipe')->where('login', $login)->where('nomequipe', $nomequipe);
      return $this->db->update('Membre_equipe', $donnees);
   }

   public function isAdmin($login, $nomequipe) {
      $q= $this->db
      ->select('admin', 'nom')
      ->from('Equipe')
      ->where('admin',$login)
      ->where('nom', $nomequipe);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function isEntraineur($login) {
       $q= $this->db
      ->select('login', 'entraineur')
      ->from('Membre_equipe')
      ->where('login',$login)
      ->where('entraineur', 1);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function creerEvent($donnees) {
      $this->db->insert('Evenement', $donnees);
   }

public function presenceEvent($donnees) {
$this->db->insert('Presence', $donnees);
}

public function getListePresence($idEvent) {
        return $this->db->select('*')
      ->from('Presence')
      ->where('idEvent', $idEvent)
      ->get()->result_array();
}

public function verifyPresenceMembre($login,$idEvent) {
    $q= $this->db
      ->select('login', 'idEvent')
      ->from('Presence')
      ->where('login',$login)
      ->where('idEvent', $idEvent);

      $q = $q->get();

      if ( $q->num_rows() > 0) {
         return true;
      } else {
         return false;
      }
}
 
}