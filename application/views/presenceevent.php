<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">

  <?php echo validation_errors();?>
  <?php echo form_open('C_Equipe/presenceEvent/');?>


  <fieldset><legend><h2>Déclarer sa présence</h2></legend>
    <h3>Vous pouvez vous déclarer présent, absent, en attente ou modifier votre présence</h3><br/><br/>

    <label for="presence">Indiquez votre présence pour l'événement </label><br/><br/>
                <span class='listespan'>
                  <select class="liste" id="presence" name="presence">
                      <option value="" disabled selected>Choisissez
                      <option value="present"> Présent
                      <option value="absent"> Absent
                      <option value="ne sais pas"> Ne sais pas
                  </select>
                </span><br />

<?php foreach ($nom as $valeur) { ?>

<?php echo "<input type='hidden' value='".$valeur['idEvent']."' name='idEvent'> ";?>

<?php }?>

    <input class="btn" type="submit" value="Déclarer sa présence"/>
  </fieldset>
  

</div>
