


<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">


  <?php site_url('C_Equipe/voirEvent'); ?>
<p> Vous avez déjà déclarer votre présence pour cette événement.</p>

  <h2> Liste des événements associés à vos équipes</h2>
  <br/><br/>
  <?php
  foreach ($info as $valeur) { ?>
  <?php echo "<div class='infos'>" ?>
  <?php echo "<h5 class='nomutilisateur'>Equipe ".ucfirst($valeur['nomequipe'])."<br/><br/></h5>"?>
  
  <?php echo "<div class='infoprofil'>Type de l'événement : </div>"."<div class='infodynamique'>".$valeur['type']."</div>"  ?>
  </br>
  <?php echo "<div class='infoprofil'>Debut de l'événement </div>: "."<div class='infodynamique'>".$valeur['debut']."</div>"  ?>
  </br>
  <?php echo "<div class='infoprofil'>Fin de l'événement : </div>"."<div class='infodynamique'>".$valeur['fin']."</div>"   ?>
  </br>
  <?php echo "<div class='infoprofil'>Périodicité : </div><div class='infodynamique'>".$valeur['periode']."</div>" ?>
  </br>
  <?php echo "<div class='infoprofil'>Lieu : </div><div class='infodynamique'>".$valeur['lieu']."</div>" ?>
  </br>
  <?php echo "<div class='infoprofil'>Description : </div> "."<div class='infodynamique'>".$valeur['description']."</div>";?>
</br><br/>
  <a href="presenceEvent/<?php echo $valeur['idEvent'] ?>" ><p class="lien" name="presence"> Déclarer sa présence</p></a>
  <br/><a href="listePresenceEvent/<?php echo $valeur['idEvent'] ?>" ><p class="lien" name="listePresenceEvent">Voir la liste des absents/présents</p></a>
  <?php echo "</div>"?>
  <?php echo '<div class="bordure"> </div>'; ?>



  <?php }; ?>


</div>