<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">

  <?php echo validation_errors();?>
  <?php echo form_open('C_Equipe/rejoindreEquipe');?>


  <fieldset><legend><h2>Rejoindre une équipe</h2></legend>
    <h3>Vous pouvez rejoindre autant d'équipes que vous voulez</h3><br/><br/>

    <label for="nom">Nom de léquipe</label><br /><br/>

  <p class="bulleRejoindreEquipe"> 
    <a href="#" class="infoAnnuaire"> ?
      <span> Vous pouvez rejoindre une équipe en fonction de votre sexe</span>
    </a>
  </p>
    <?php
    echo "<span class='listespan'>";
    echo "<select class='liste' name='nom' id='nom'>";
    echo '<option value="" disabled selected>Choisissez votre équipe</option>';
    foreach ($nom as $results) {                        
      echo '<option value="'.$results["nom"]."\">".$results["nom"]."</option>";
    }
          foreach ($nom1 as $results2) {
      echo '<option value="'.$results2["nom"]."\">".$results2["nom"]."</option>";
    }
    echo "</select>";
    echo "</span>";
    ?>
    <br />

    <label for="mdp">Mot de passe de l'équipe</label>
    <input id="mdp" type="password" name="mdp" placeholder="******" maxlength="30" value="<?php echo set_value('mdp');?>">


    <input class="btn" type="submit" value="Rejoindre l'équipe"/>
  </fieldset>
</div>
