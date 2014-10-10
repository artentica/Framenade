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
<form method="post" action="index.php/verif_user">
   <p>
       <label for="mail">Courriel</label> : <input type="email" name="mail" id="mail" /><br/>
       <label for="password">Password</label> : <input type="password" name="password" id="password" />
       <input type="submit" value="Envoyer" />
   </p>
</form>
<?php end_content_for(); ?>