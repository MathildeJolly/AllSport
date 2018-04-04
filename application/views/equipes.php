<head>
	<meta charset="UTF-8" />
	<link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">


	<?php site_url('C_Equipe/voirEquipes'); ?>

	<h2> Liste des équipes</h2>

		<p class="bulleAnnuaire"> 
		<a href="#" class="infoAnnuaire"> ?
			<span> Cliquer sur le nom d'une équipe pour accéder à sa page</span>
		</a>
	</p>
	<br><br>

	<?php foreach ($info as $valeur) { ?>
	<?php echo "<div class='infos'>" ?>
	<a href='profilEquipe/<?php echo $valeur['nom'] ?>'>
	<?php echo "<h5 class='nomutilisateur'>".ucfirst($valeur['nom'])."<br/><br/></h5></a>"?>
	<img class="logo" src="<?php 
	echo base_url().'./images/avatar/'.$valeur['logo']; ?>">
	<?php echo "<div class='infoprofil'>Sport : </div>"."<div class='infodynamique'>".ucfirst($valeur['sport'])."</div>";  ?>
	<br/>
	<?php echo "<div class='infoprofil'>Ville : </div>"."<div class='infodynamique'>".ucfirst($valeur['ville'])."</div>";   ?>
	<br/>
	<?php echo "<div class='infoprofil'>Description : </div>"."<div class='infodynamique'>".$valeur['description']."</div>"; ?>
	<br/>
	<div class='infoprofil'>Mixite : </div><div class='infodynamique'>     
	<?php 
    if ($valeur['sexe']==1) {
      echo "<div class='infodynamique'>Equipe Masculine</p></div>";
    } elseif ($valeur['sexe']==2) {
      echo "<div class='infodynamique'>Equipe Féminine</p></div>";
    } else {
    	echo "<div class='infodynamique'>Equipe Mixte</p></div>";
    }
    echo "</div>";
    	?>
	<br/>
	<?php echo "<div class='infoprofil'>Administrateur : </div>"."<div class='infodynamique'>".$valeur['admin']."</div>";?>
	<br/>
	<?php echo "</div>";?>
	<div class="bordure"> </div>
	<?php }; ?>






</div>