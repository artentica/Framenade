<?php content_for('css')?>
<link rel=stylesheet href="css/default.css" type="text/css" />
<?php end_content_for();?>

<?php content_for('header'); ?>
<div class="titre">
<p  style="text-align:center"><img src="images/logo_ISEN.png"></p>
<p  style="text-align:center">Documents de rentrée 2015</p>
</div>
<?php end_content_for();?>

<?php content_for('body'); ?>

<form method="post" action="include/verif_user.php">
   <p>
       <label for="mail" class="monLabel">Courriel</label> : <input type="email" name="mail" id="mail" />
       <br/><p class="texte">(Cette adresse électronique sera votre identifiant)</p>
       <label for="password" class="monLabel">Password</label> : <input type="password" name="password" id="password" />
       <br/><p class="texte">(Le mot de passe qui vous a été envoyé par courrier)</p>
       <input type="submit" value="Valider" />
   </p>
</form>
<?php end_content_for(); ?>