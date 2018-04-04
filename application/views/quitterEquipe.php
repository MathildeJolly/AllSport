<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">

  <?php echo validation_errors();?>

 <?php echo form_open('C_Equipe/quitterEquipe');?>

        <br/> <h3>Quitter une équipe<br><br></h3>
     
         <label for="nom">Nom de léquipe</label><br />

        <?php
        echo "<span class='listespan'>";
        echo "<select class='liste' name='nom' id='nom'>";
        echo '<option value="" disabled selected>Choisissez l\'équipe</option>';
        foreach ($nomequipe as $results) {                        
        echo '<option value="'.$results['nomequipe']."\">".$results['nomequipe']."</option>";
        }
        echo "</select>";
        echo "</span>";
        ?>
        <br />       
        <input class="btn" type="submit" value="Quitter l'équipe"/><br/><br/>

  </div>

      
        <?php echo form_close();?>

    </div>