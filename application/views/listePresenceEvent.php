<head>
	<meta charset="UTF-8" />
	<link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">


	<?php site_url('C_Equipe/listePresenceEvent'); ?>

	<h2> Liste des absents/présents</h2>
	<br/><br/>
	<?php if($membre == false){
		echo "<p> Il n'y a aucun événement pour l'instant, revenez plus tard!</p>";
	} else {
	echo "<div class='infos'>" ?>
	<?php foreach ($membre as $valeur) { ?>

	
	<?php echo "<div class='infoprofil'>".ucfirst($valeur['login'])." : </div>"."<div class='infodynamique'>".$valeur['presence']."</div>"  ?>
	</br>	
	<?php echo '<div class="bordure"> </div>'; ?>



	<?php }}; ?>


</div>