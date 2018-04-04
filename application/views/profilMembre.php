  <head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
  </head>
  <div class="page">


   <?php site_url('C_Profil/profilMembre'); ?>
  

   <?php foreach ($info as $valeur) { ?>
   <?php echo "<h2 class='titreprofil'>Profil de ".ucfirst($valeur['login'])."<br/></h2>"?>
   <img class="avatar" src="<?php 
   echo base_url().'images/avatar/'.$valeur['avatar']; ?>">
   <?php echo "<div class='infoprofil'>Nom : </div>"."<div class='infodynamique'>".ucfirst($valeur['nom'])."</div><br/><br/>"  ?>
   <?php echo "<div class='infoprofil'>Prénom </div>: "."<div class='infodynamique'>".ucfirst($valeur['prenom'])."</div><br/><br/>"   ?>
<div class='infoprofil'>Sexe : </div>
 <?php 
    if ($valeur['sexe']==1) {
      echo "<div class='infodynamique'>Homme</div>";
    } else {
      echo "<div class='infodynamique'>Femme</div>";
    }?>
   <?php  } ?>


   <div class="bordure"> </div>
      <div class="page2"> 
   <p> <div class="infoprofil">Equipes de <?php echo ucfirst($valeur['login'])?> : </div><br/>

     <?php 
     echo "<div class='equipecadre'>";

     if($nomequipe != false) {

      foreach ($nomequipe as $valeur) {

       echo "<p>".$valeur['nomequipe']."</p><br/>";
     }
   } else {

    echo "<div class='infodynamique'>".ucfirst($valeur['login'])." n'a pas d'équipes.</div>";
  }
  echo "</div>"
  ?>


  <?php foreach ($info as $valeur) { ?>
  <p> <div class="infoprofil"><?php echo ucfirst($valeur['login'])?> est Administrateur des équipes : </div><br/>
   <?php 
   echo "<div class='equipecadre'>";
   if($admin == true){
   foreach ($admin as $valeur) {
    echo "<p>".$valeur['nom']."</p><br/>";
  }
} else {
  echo "<div class='infodynamique'>".ucfirst($valeur['login'])." est Administrateur d'aucune équipe.</div>";
}

  echo "</div>";
  ?>

  <?php  } ?>
  <?php foreach ($info as $valeur) { ?>
  <p> <div class="infoprofil"><?php echo ucfirst($valeur['login'])?> est l'entraîneur des équipes : </div><br/>
   <?php 
   echo "<div class='equipecadre'>";

   if($entraineur == true) {


     foreach ($entraineurEquipe as $valeur) {
      echo "<p>".$valeur['nomequipe']."</p><br/>";

    } 
  } else {

   echo "<div class='infodynamique'>".ucfirst($valeur['login'])." est entraîneur dans aucune équipe.</div>";
  }
  echo "</div>";
  ?>

  <?php  } ?>

  </div></div>