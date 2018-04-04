<head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>
    <div class="page">
        
            <?php echo validation_errors();?>
            <?php echo form_open('C_Session/connexion');?>


             <a href="<?php echo site_url('C_Membre/inscription'); ?>"> Pas encore inscrit ? </a>
              <br/>
              <?php echo $erreur ;?>
            <fieldset><legend><h2>Connexion</h2></legend>
                <h3>Vous possédez déjà un compte ? Connectez-vous...<br><br></h3>
                    <label for="login">Login</label>
                    <input id="login" name="login" placeholder="Login" type="text" maxlength="15" value="<?php echo set_value('login');?>">
                    
                    <label for="mdp">Mot de passe</label>
                    <input id="mdp" type="password" name="mdp" placeholder="******" maxlength="30" value="<?php echo set_value('mdp');?>">
                            

                    <input class="btn" type="submit" value="se connecter"/>

            </fieldset>     
 </div>