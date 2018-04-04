<head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">


   <?php site_url('C_Profil/profil'); ?>


   <a href="editer" class="editprofil"><img class="edit" src="<?= base_url();?>//images/edit.jpg"></a>


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

      <div class="page2"> 

   <p> <div class="infoprofil">Vos équipes : </div><br/>

     <?php 


     if($nomequipe != false) {
     echo "<div class='equipecadre'>";
        foreach ($nomequipe as $valeur) {

         echo "<p>".$valeur['nomequipe']."</p><br/>";

     }
     echo '<a href="../C_Equipe/quitterEquipe"><p class="lien"> Quitter une équipe </p></a><br/><br/>';
     echo "</div>";
 } else {

    echo "<div class='equipecadre'><p>Vous n'avez pas d'équipes.</p></div>";
}


?>



<p> <div class="infoprofil">Vous êtes l'Administrateur des équipes : </div><br/>
 <?php 

    if($admin == true){
       echo "<div class='equipecadre'>";
 foreach ($admin as $valeur) {
    echo "<p>".$valeur['nom']."</p><br/>";

}
    echo "</div>";
echo '<a href="../C_Equipe/designerEntraineur"><p class="lien"> Gérer vos équipes </p></a><br/>';
} else {
  echo "<div class='equipecadre'><p>Vous êtes Administrateur d'aucune équipe.</p></div>";
}

?><br/>




<p> <div class="infoprofil">Vous êtes l'entraîneur des équipes : </div><br/>
 <?php 


 if($entraineur == true) {
 echo "<div class='equipecadre'>";

 foreach ($entraineurEquipe as $valeur) {
    echo "<p>".$valeur['nomequipe']."</p><br/>";
echo "</div>";
} 
echo '<a href="../C_Equipe/creerEvent"><p class="lien"> Créer un événement </p></a><br/>';
} else {

  echo "<div class='equipecadre'><p>Vous n'êtes pas entraineur.</p></div>";
}

?><br/>
       <div class="infoprofil">Mes invitations : </div><br/>
    <?php 

    if($invitation == true ) {
       echo "<div class='equipecadre'>";
       foreach ($invitation as $valeur) {
       echo "<div class='infodynamique'> Invitation de l'équipe ".$valeur['nomequipe']."</div>";

       echo "<br/><a href='./accepterInvitation/".$valeur['nomequipe']."' name='nomequipe' value='nomequipe'>
       <p class='lien'> Accepter</p></a><br/>";
       echo "<a href='./refuserInvitation/".$valeur['nomequipe']."' name='nomequipe' value='nomequipe'>
        <p class='lien'>Refuser</p></a><br/>";

  }       echo "</div>";} else { 

     echo "<div class='equipecadre'><p>Vous n'avez pas d'invitations.</p></div>";
     } ?>
    
     

</div>

</div>