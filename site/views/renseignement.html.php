<?php content_for('header'); ?>
<img src="../images/logo_ISEN.png" align="center">
<?php end_content_for();?>


$test = query('SELECT * FROM data');

<?php content_for('body'); ?>

<?php
	print_r($user);
?>
<div class="col-md-6">
	<p>Nous vous remercions de bien vouloir compléter ce formulaire avant d'accéder aux documents de rentrée.</p>
	<p>Identifiant : <?= ?></p>

	<form class="form-horizontal">
		<fieldset>
			<legend>Etudiant(e)</legend>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="nom_fils">Nom de l'étidiant(e):</label>  
			  <div class="col-md-4">
			  <input id="nom_fils" name="nom_fils" type="text" placeholder="<?= ?>" class="form-control input-md" required="">
			  <span class="help-block">Entrez le nom de l</span>  
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="prenom_fils">Prénom de l'étudiant(e)</label>  
			  <div class="col-md-4">
			  <input id="prenom_fils" name="prenom_fils" type="text" placeholder="<?= ?>" class="form-control input-md" required="">
			  <span class="help-block">Entrez le prénom de l</span>  
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="date">Date de naissance</label>  
			  <div class="col-md-4">
			  <input id="date" name="date" type="date" placeholder="<?= ?>" class="form-control input-md" required="">
			  <span class="help-block">Entrez la date de naissance de l'étudiant</span>  
			  </div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Parents</legend>
		
			<div class="form-group">
			  <label class="col-md-4 control-label" for="tel">Téléphone</label>  
			  <div class="col-md-4">
			  <input id="tel" name="tel" type="tel" placeholder="<?= ?>" class="form-control input-md" required="">
			  <span class="help-block">Entrez le téléphone des parents</span>  
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="mail">Courriel</label>  
			  <div class="col-md-4">
			  <input id="mail" name="mail" type="email" placeholder="<?= ?>" class="form-control input-md" required="">
			  <span class="help-block">E-mail des parents</span>  
			  </div>
			</div>

		</fieldset>
		<input class="col-sm-3 col-sm-offset-6"	type="submit" 	value="Enregistrer">
		<input class="col-sm-3" type="reset" 	value="Quitter">
	</form>
	<p>Conformément à la loi "Informatique et Libertés" (loi du 6 janvier 1978 telle que modifiée), vous bénéficiez d'un droit d'accès, de rectification et de suppression des données personnelles vous concernant, que vous pouvez exercer en vous adressant à l'adresse e-mail mentionnée ci-dessous.</p>
	<hr>
	<p>© ISEN Bretagne (2014)  - Contact : 
		<a href="jean-pierre.gerval@isen-bretagne.fr">jean-pierre.gerval@isen-bretagne.fr</a>
	</p>
</div>

<div class="col-md-6">

</div>


<?php end_content_for(); ?>