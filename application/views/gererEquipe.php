<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
<div class="page">

  <?php echo validation_errors();?>
  <?php echo form_open('C_Equipe/designerEntraineur');?>


    <fieldset><legend><h2>Gérer vos équipes</h2></legend>
   <h3>Désigner un entraîneur<br><br></h3>
        <label for="nom">Nom de léquipe</label><br />

        <?php
        echo "<span class='listespan'>";
        echo "<select class='liste' name='nom' id='nom'>";
        echo '<option value="" disabled selected>Choisissez l\'équipe</option>';
        foreach ($nom as $results) {                        
        echo '<option value="'.$results["nom"]."\">".$results["nom"]."</option>";
        }
        echo "</select>";
        echo "</span>";
        ?>
        <br />

        <label for="membre">Login du futur entraîneur</label>
        <input id="membre" type="text" name="membre" maxlength="30">


        <input class="btn" type="submit" value="Désigner comme entraîneur"/><br/><br/><br/>
        <?php echo form_close();?>

                

         <?php echo form_open('C_Equipe/inviterMembre');?>

         <h3>Inviter un membre dans une équipe<br><br></h3>
         <a href="../C_Profil/voirUtilisateur"  target="_blank"><p class="lien"> Liste des utilisateurs </p></a><br/><br/>
         <label for="nom">Nom de léquipe</label><br />

        <?php
        echo "<span class='listespan'>";
        echo "<select class='liste' name='nom' id='nom'>";
        echo '<option value="" disabled selected>Choisissez l\'équipe</option>';
        foreach ($nom as $results) {                        
        echo '<option value="'.$results["nom"]."\">".$results["nom"]."</option>";
        }
        echo "</select>";
        echo "</span>";
        ?>
        <br />

        <label for="membre">Login du futur membre</label>
        <input id="membre" type="text" name="membre" maxlength="30">



     

        <input class="btn" type="submit" value="Envoyer une invitation"/><br/><br/>
        <?php echo form_close();?>




               <?php echo form_open('C_Equipe/supprimerEquipe');?>

        <br/> <h3>Supprimer une équipe<br><br></h3>
     
         <label for="nom">Nom de léquipe</label><br />

        <?php
        echo "<span class='listespan'>";
        echo "<select class='liste' name='nom' id='nom'>";
        echo '<option value="" disabled selected>Choisissez l\'équipe</option>';
        foreach ($nom as $results) {                        
        echo '<option value="'.$results["nom"]."\">".$results["nom"]."</option>";
        }
        echo "</select>";
        echo "</span>";
        ?>
        <br />


 <label for="mdp">Mot de passe de l'équipe</label>
    <input id="mdp" type="password" name="mdp" placeholder="******" maxlength="30">

        <input class="btn" type="submit" value="Supprimer l'équipe"/><br/><br/>
        <?php echo form_close();?>




        <?php echo form_open('C_Equipe/modifierEquipe');?>

        <br/> <h3>Modifier une équipe<br><br></h3>
     
         <label for="nom">Nom de léquipe</label><br />

        <?php
        echo "<span class='listespan'>";
        echo "<select class='liste' name='nom' id='nom'>";
        echo '<option value="" disabled selected>Choisissez l\'équipe</option>';
        foreach ($nom as $results) {                        
        echo '<option value="'.$results["nom"]."\">".$results["nom"]."</option>";
        }
        echo "</select>";
        echo "</span>";
        ?>
        <br />

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
             <input type="file" name="logo" size="20" /> <br /><br />
               <input class="btn" type="submit" value="Modifier l'équipe"/><br/><br/>

      <br/>


      
        <?php echo form_close();?>



       



  </fieldset>

</div>
