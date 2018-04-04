<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">

</head>

<div class="page">

    <?php echo validation_errors();?>
    <?php echo form_open_multipart('C_Equipe/creerEvent');?>


    <fieldset><legend><h2>Créer un événement</h2></legend>
        <h3>Vous pouvez créer un évenement en étant entraîneur<br><br></h3>


        <br/>

        <p class="bulle"> 
            <a href="#" class="infoCalendrier"> ?
                <span> Cliquer sur le calendrier pour choisir une date de début/fin</span>
            </a>
        </p>

        <?php echo $calendrier; 
        if(isset($debut) && $debut) {
           echo  "<br/><label for='dateDebut'>Date du début de l'évenement</label>";
           echo '<input type="text" name="debut" value="'.$debut.'" />';

       }
       if(isset($fin) && $fin) {
         echo  "<br/><label for='dateDebut'>Date de fin de l'évenement</label>";
         echo '<input type="text" name="fin" value="'.$fin.'" />';

     }
     ?><br/>
     <label for='equipe'>Equipe</label><br/><br/>
     <?php

     echo "<span class='listespan'>";
     echo "<select class='liste' name='nomequipe' id='nomequipe'>";
     echo '<option value="" disabled selected>Choisissez votre équipe</option>';

     foreach ($nomequipe as $results) {                        
        echo '<option value="'.$results["nomequipe"]."\">".$results["nomequipe"]."</option>";
    }
    echo "</select>";
    echo "</span>";
    ?> <br/>

    <label for="type"> Type de l'événement </label><br/>
    <span class='listespan'>
    <select class="liste" name="type" id="type">    
    <option value="" disabled selected>Choisissez le type d'évenement</option>
    <option value="entrainement"> Entraînement
    <option value="match/competition"> Match, Compétition
    </select>
    </span><br/>



    <label for='periode'>Périodicité de l'évenement</label>
    <input type="text" name="periode" value="">

    <label for='lieu'>Lieu de l'évenement</label>
    <input type="text" name="lieu" value="">

    <label for='description'>Description de l'évenement</label>
    <input type="text" name="description" value="">



    <input class="btn" type="submit" value="Créer un événement"/>
</div>
</fieldset>


</div>