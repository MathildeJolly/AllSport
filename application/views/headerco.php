

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>AllSports</title>
        <link rel="shortcut icon" href="<?= base_url();?>/images/favicon.png">
        <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
    </head>

    <body>
        <div class="menuco">

             <ul>
                <li><a class="btnA" href="<?php echo site_url('C_Profil/profil'); ?>">Profil</a></li>
                <li><a class="current" href="<?php echo site_url('C_Equipe/creerEquipe'); ?>">Créer équipe</a></li>
                <li><a href="<?php echo site_url('C_Equipe/rejoindreEquipe'); ?>">Rejoindre équipe</a></li>
                <li><a href="<?php echo site_url('C_Equipe/designerEntraineur'); ?>">Gérer équipes</a></li>
                <li><a href="<?php echo site_url('C_Equipe/voirEvent'); ?>">Calendrier</a></li>
                <li><a href="<?php echo site_url('C_Equipe/voirEquipes'); ?>">Equipes</a></li>
                <li><a href="<?php echo site_url('C_Profil/voirUtilisateur'); ?>">Utilisateurs</a></li>
              
                <li><a href="../C_Session/deconnexion">Déconnexion</a></li>
            </ul>
        </div>
    </body>