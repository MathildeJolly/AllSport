<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    
    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">

</head>
        <div class="page">
            <?php echo validation_errors();?>
            <?php echo form_open_multipart('C_Profil/editer');?>


                <h2>Modifier votre avatar<br><br></h2>
                <div>


            

                    <label for="avatar">Avatar</label> <br/><br/>
                    <input id="avatar" type="file" name="avatar"/> <br /><br />
                    
                    <input class="btn" type="submit" value="Modifier son profil"/>
                    </div>
                </fieldset>

           
        </div>