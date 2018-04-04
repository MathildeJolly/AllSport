<head>
	<meta charset="UTF-8" />
	<link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">


	<?php site_url('C_Profil/voirUtilisateur'); ?>


	<h2> Liste des utilisateurs </h2>      
	<p class="bulleAnnuaire"> 
		<a href="#" class="infoAnnuaire"> ?
			<span> Cliquer sur le pseudo d'un utilisateur pour accéder à son profil</span>
		</a>
	</p>

	<br><br>
	<?php foreach ($info as $valeur) { ?>
	<?php echo "<div class='infos'>" ?>

	<a href='profilMembre/<?php echo $valeur['login'] ?>'>
		<?php echo "<h5 class='nomutilisateur'>".ucfirst($valeur['login'])."<br/><br/></h5></a>"?>
		<img class="logo" src="<?php 
		echo base_url().'images/avatar/'.$valeur['avatar']; ?>">
		<?php echo "<div class='infoprofil'>Nom : </div><div class='infodynamique'>".ucfirst($valeur['nom'])."</div>" ?>
	</br>
	<?php echo "<div class='infoprofil'>Prénom : </div><div class='infodynamique'>".ucfirst($valeur['prenom'])."</div>" ?>
</br>
<?php echo "<div class='infoprofil'>Email : </div><div class='infodynamique'>".$valeur['email']."</div>" ?>
</br>
<div class='infoprofil'>Sexe : </div>
    <?php 
    if ($valeur['sexe']==1) {
      echo "<div class='infodynamique'>Homme</div>";
    } else {
      echo "<div class='infodynamique'>Femme</div>";
    }?>
</br>

<?php echo "</div>"?>
<div class="bordure"> </div>

<?php }; ?>







</div>