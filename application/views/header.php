

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>AllSports</title>
        <link rel="shortcut icon" href="<?= base_url();?>/images/favicon.png">
        <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
    </head>

    <body>
        <div class="menu">

             <ul>
                <li><a class="btnA" href="<?php echo site_url('C_Membre/inscription'); ?>">Inscription</a></li>
                <li><a href="<?php echo site_url('C_Session/connexion'); ?>">Connexion</a></li>
                <li><a class="btnC" href="<?php echo site_url('C_Contact'); ?>">Contact</a></li>
            </ul>
        </div>
    </body>