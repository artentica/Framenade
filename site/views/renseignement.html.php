<?php content_for('link');   	?>
	<link rel="stylesheet" href="../CSS/documents.css">
<?php end_content_for(); 		?>
<?php content_for('header'); 	?>
	<div class="row" id="header">
		<img class="col-sm-2 pull-left" src="../images/logo_ISEN.png" align="center">
		<h1  class="col-sm-3 col-sm-offset-2" >Documents de rentrée</h1>
		<h3	 class="col-sm-4 pull-right">ISEN-Brest</h3>
	</div>
	<hr>
<?php end_content_for();		?>

<?php content_for('body'); 		?>
	<div class="col-md-6">
		<form class="form-horizontal">
			<fieldset id="etudiant">
				<p>Nous vous remercions de bien vouloir compléter ce formulaire avant d'accéder aux documents de rentrée.</p>
				<p>Identifiant : <?= $user['identifiant'] ?></p>
				<legend>Etudiant(e)</legend>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="nom_fils">Nom de l'étidiant(e):</label>  
				  <div class="col-md-4">
				  <input id="nom_fils" name="nom_fils" type="text" placeholder="<?= $user['nom_fils'] ?>" class="form-control input-md" required="">
				  <span class="help-block">Entrez le nom de l</span>  
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prenom_fils">Prénom de l'étudiant(e)</label>  
				  <div class="col-md-4">
				  <input id="prenom_fils" name="prenom_fils" type="text" placeholder="<?= $user['prenom_fils'] ?>" class="form-control input-md" required="">
				  <span class="help-block">Entrez le prénom de l</span>  
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="date">Date de naissance</label>  
				  <div class="col-md-4">
				  <input id="date" name="date" type="date" value="<?= $date ?>" class="form-control input-md" required="">
				  <span class="help-block">Entrez la date de naissance de l'étudiant</span>  
				  </div>
				</div>
			</fieldset>
			<fieldset id="parent">
				<legend>Parents</legend>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="tel">Téléphone</label>  
				  <div class="col-md-4">
				  <input id="tel" name="tel" type="tel" placeholder="<?= $user['tel_mobile'] ?>" class="form-control input-md" required="">
				  <span class="help-block">Entrez le téléphone des parents</span>  
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="mail">Courriel</label>  
				  <div class="col-md-4">
				  <input id="mail" name="mail" type="email" placeholder="<?= $user['courriel'] ?>" class="form-control input-md" required="">
				  <span class="help-block">E-mail des parents</span>  
				  </div>
				</div>
				<input class="col-sm-3" 				type="reset" 	value="Quitter">
				<input class="col-sm-3 col-sm-offset-6"	type="submit" 	value="Enregistrer">
			</fieldset>
				
		</form>
		<small>Conformément à la loi "Informatique et Libertés" (loi du 6 janvier 1978 telle que modifiée), vous bénéficiez d'un droit d'accès, de rectification et de suppression des données personnelles vous concernant, que vous pouvez exercer en vous adressant à l'adresse e-mail mentionnée ci-dessous.
		</small>
		<hr>
		<p>© ISEN Bretagne (2014)  - Contact : 
			<a href="jean-pierre.gerval@isen-bretagne.fr">jean-pierre.gerval@isen-bretagne.fr</a>
		</p>
	</div>
	<div class="col-md-6" id="files">
		<p>Vous trouverez sur cette page toutes les informations utiles pour la rentrée 2014 en sélectionnant l'année qui vous concerne. Vous pouvez télécharger chaque fichier (format PDF) ou bien l'ensemble des fichiers (format ZIP) pour l'année choisie. A imprimer avec modération...
		</p>
		<hr>
		<div class="form-group">
			<label class="col-md-4 control-label" for="">Choisissez votre année : </label>
		  	<div class="col-md-5">
		    	<select id="SelectPromo" name="" class="form-control">
		      		<option value="" selected disabled>Séléctionnez une promo</option>
			    </select>
			</div>
			<div id="conteneur">
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap.min.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {

		var sel 		= $('#SelectPromo');
		var conteneur 	= $('#conteneur');
		$.ajax( // chargment des categories ( apl bdd lent donc transvasé coté client )
		{
			url: '../include/fonction.php',
			dataType: 'json',
			data: {search: 'promos'},
		})
		.done(function( data ) 
		{
			console.log("success promo changed");
			$.each( data, function(key, value) 
			{
			    sel.append('<option value=' + value + '>' + value + '</option>');
			});
		})
		.fail(function( jqXHR, textStatus ) 
		{
			console.log("error promo not changed: " + textStatus);
			alert(jqXHR);
		});

		sel.change(function(event) {
			
			console.log('changement de promo ' + sel.val() );
			$.ajax({
				url: '../include/fonction.php',
				type: 'GET',
				dataType: 'json',
				data: {param1: 'value1'},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
	</script>
<?php end_content_for(); ?>