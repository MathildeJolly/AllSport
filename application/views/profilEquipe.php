  <head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
  </head>
  <div class="page">


   <?php site_url('C_Equipe/profilEquipe'); ?>
  

   <?php foreach ($info as $valeur) { ?>
   <?php echo "<h2 class='titreprofil'>Equipe ".ucfirst($valeur['nom'])."<br/></h2>"?>
   <img class="avatar" src="<?php 
   echo base_url().'images/avatar/'.$valeur['logo']; ?>">
   <?php echo "<div class='infoprofil'>Sport : </div>"."<div class='infodynamique'>".ucfirst($valeur['sport'])."</div>"  ?><br/><br/>
   <?php echo "<div class='infoprofil'>Ville </div>: "."<div class='infodynamique'>".ucfirst($valeur['ville'])."</div>"   ?><br/><br/>
<div class='infoprofil'>Mixite : </div>
 <?php 
    if ($valeur['sexe']==1) {
      echo "<div class='infodynamique'>Homme</p>";
    } else if ($valeur['sexe']==2){
      echo "<div class='infodynamique'>Femme</p>";
    } else {
      echo "<div class='infodynamique'>Mixte</p>";
    }?>
  

   <?php  } ?>
   <div class="bordure"> </div>

<div class="page2"> 
<div class='infoprofil'>Membre de l'équipe : </div><br/>
<div class='equipecadre'>
   <?php foreach ($membre as $valeur) {?>
     <?php echo "<div class='infodynamique'>".$valeur['login']."</div>";?><br/>
  <?php  }?>
</div>





  <div class="infoprofil">Administrateur de l'équipe : </div><br/>
  <div class='equipecadre'>
    <?php foreach ($info as $valeur) { ?>
  <?php echo "<div class='infodynamique'>".$valeur['admin']."</div>";?><br/>
<?php } ?>
</div>

 <!--<div class="infoprofil">Entraîneur(s) de l'équipe : </div><br/>

    <?php 

    if($entraineur  == 1) {
       echo "<div class='equipecadre'>";
       foreach ($entraineur as $valeur) {
       echo "<div class='infodynamique'>".$valeur['login']."</div>";
       echo "</div>";

  }} else { 

     echo "<div class='equipecadre'><p>Il n'y a aucun entraineur dans cette équipe.</p></div>";
     } ?>
-->



    
     





  </div></div>