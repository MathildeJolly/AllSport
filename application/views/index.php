<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">

</head>

        <div class="page">
            <?php echo validation_errors();?>
            <?php echo form_open_multipart('C_Membre/inscription');?>
<h3> Bienvenue sur AllSport! Site de gestion de club de sport en ligne.</h3><br/><br/>
            <a href="<?php echo site_url('C_Session/connexion'); ?>"> Déjà inscrit ? Connectez-vous ! </a>

                <fieldset><legend><h2>Inscription</h2></legend>
                <h3>Inscrivez-vous dès maintenant...<br><br></h3>
                <div>
                    <label for="login">Login</label>
                    <input id="login" name="login" placeholder="Login" type="text" maxlength="15" required">

                    <label  for="nom">Nom</label>
                    <input id="nom" name="nom" placeholder="Nom" type="text" required">
                
                    <label for="prenom">Prénom</label>
                    <input id="prenom" name="prenom" placeholder="Prénom" type="text" required">

                    <label for="sexe">Sexe</label><br/>
                    <span class='sexespan'>
                    <select class="sexe" id="sexe" name="sexe">
                         <option value="" disabled selected>Sexe
                        <option value="1"> Homme
                        <option value="2"> Femme
                    </select></span><br />
                    
                    <label for="email">Email</label>
                    <input id="email" name="email" placeholder="Email" type="text" required">
        
                    <label for="mdp">Mot de passe</label>
                    <input id="mdp" type="password" name="mdp" placeholder="******" maxlength="30" required">

                    <label for="avatar">Avatar</label> <br/><br/>
                    <input type="file" name="avatar" required/> <br /><br />
                    
                <input class="btn" type="submit" value="S'inscrire"/>
                    </div>
                </fieldset>

           
        </div>