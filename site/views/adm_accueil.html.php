<?php content_for('link')?>
<link rel=stylesheet href="css/defaultAdmin.css" type="text/css" />
<?php end_content_for();?>

<?php content_for('header'); ?>
<div class="titre">
<p style="text-align:center"><img src="images/logo_ISEN.png" width="270"></p>
</div>
<?php end_content_for();?>

<?php content_for('body'); ?>
	<h1 style="text-align:center">Bienvenue sur l'interface d'administration</h1>
	<hr>
	<div class="row">
		<form class="form-horizontal col-sm-4 col-sm-offset-4" method="POST" action="<?= url_for('/administration_panel') ?>">
			<fieldset>

				<!-- Form Name -->
				<legend>Identification</legend>

				<!-- Password input-->
				<div 			class="form-group <?php if(isset($flash[0])) echo $flash[0]  ?>">
					<label 		class="control-label" for="passwordinput">Mot de passe</label>
				    <input 		class="form-control" id="passwordinput" name="pass" type="password" placeholder="placeholder">
				    <span 		class="help-block">Mot de passe generique ( 1234 par defaut )</span>
				</div>
				<input 			class="btn btn-success btn-lg" type="submit" value="Connexion">
			</fieldset>
		</form>
	</div>
<?php end_content_for();?>

<?php content_for('footer')?>
<hr/>
<div class="footer" ><div class="container"><p>© ISEN Bretagne (2014)  - Contact : jean-pierre.gerval@isen-bretagne.fr</p></div></div>
<?php end_content_for();?>