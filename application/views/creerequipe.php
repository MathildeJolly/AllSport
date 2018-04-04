<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">

</head>

<div class="page">
    <?php echo validation_errors();?>
    <?php echo form_open_multipart('C_Equipe/creerEquipe');?>

    <fieldset><legend><h2>Créer une équipe</h2></legend>
        <h3>En créant une équipe, vous devenez son administrateur. Vous pouvez créer maximum cinq équipes.<br><br></h3>
        <div>
            <label for="nom">Nom de l'équipe</label>
            <input id="nom" name="nom" placeholder="Nom de l'équipe" type="text" maxlength="35" value="<?php echo set_value('nom');?>">

            <label for="mdp">Mot de passe de l'équipe</label>
            <input id="mdp" type="password" name="mdp" placeholder="******" maxlength="30" value="<?php echo set_value('mdp');?>">

            <label  for="sport">Sport</label>
            <input id="sport" name="sport" placeholder="Sport" type="text" value="<?php echo set_value('sport');?>">
            
            <label for="ville">Ville</label>
            <input id="ville" name="ville" placeholder="Ville" type="text" value="<?php echo set_value('ville');?>">

            <label for="description">Description</label>
            <input id="description" name="description" placeholder="Description de l'équipe" type="text" value="<?php echo set_value('description');?>">

             <label for="sexe">Mixité ?</label><br/>
                <span class='mixitespan'>
                  <select class="mixite" id="sexe" name="sexe">
                      <option value="" disabled selected>Choisissez
                      <option value="0"> Mixte
                      <option value="2"> Femme/Femme
                      <option value="1"> Homme/Homme
                  </select>
                </span><br />

            <label for="logo">Logo de votre équipe</label><br/><br/>
             <input type="file" name="logo" size="20" required /> <br /><br />
        </div>
      <br/>

      <button class="btn" value="creer">Créer l'équipe</button>
  </div>
</fieldset>


</div>