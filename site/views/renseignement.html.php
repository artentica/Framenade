<?php content_for('link'); ?>

	<link rel="stylesheet" href="../CSS/documents.css">
	<link rel="stylesheet" href="../CSS/animate.css">
<?php end_content_for(); ?>
<?php content_for('header'); ?>
	<div 	 class="row" id="header">
		<div class="col-sm-4">
			<img src="../images/logo_ISEN.png" align="center">
		</div>
		<h1  class="col-sm-4 text-center" >Documents de rentrée</h1>
		<h3	 class="col-sm-4"	  >BREST-RENNES</h3>
	</div>
	<hr>
<?php end_content_for();		?>
<?php content_for('body'); 		?>
	<div class="row">
		<div 		class="col-md-4 col-md-offset-1">
			<form 	class="form-horizontal" id="data" method="POST" action="../include/fonction.php?action=save">
				<fieldset id="etudiant">
					<legend>Etudiant(e)</legend>
					<div id="notif"></div>
					<p>Nous vous remercions de bien vouloir compléter ce formulaire avant d'accéder aux documents de rentrée.</p>
					<p class="red">Identifiant : <b><?= $user['identifiant'] ?></b></p>
					<div 			class="form-group" >
						<label 		class="col-md-4 control-label" for="nom_fils">Nom de l'étidiant(e):</label>  
					  	<div 		class="col-md-4">
					  		<input 	class="form-control input-sm" id="nom_fils" name="nom_fils" type="text" value="<?= $user['nom_fils'] ?>" required="">
					  	</div>
					</div>
					<div 			class="form-group">
						<label 		class="col-md-4 control-label" for="prenom_fils">Prénom de l'étudiant(e)</label>  
					  	<div 		class="col-md-4">
					  		<input 	class="form-control input-sm" id="prenom_fils" name="prenom_fils" type="text" value="<?= $user['prenom_fils'] ?>" required=""> 
					  	</div>
					</div>
					<div 			class="form-group">
						<label 		class="col-md-4 control-label" for="date">Date de naissance</label>  
						<div 		class="col-md-4">
							<input 	class="form-control input-sm" id="date" name="date" type="date" value="<?= $date ?>" required="">
						</div>
					</div>
				</fieldset>
				<fieldset id="parent">
					<legend>Parents</legend>
					<div 			class="form-group">
						<label 		class="col-md-4 control-label" for="tel">Téléphone</label>  
					  	<div 		class="col-md-4">
					  		<input 	class="form-control input-sm" id="tel" name="tel" type="tel" value="<?= $user['tel_mobile'] ?>" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required="">
					  	</div>
					</div>
					<div 			class="form-group">
						<label 		class="col-md-4 control-label" for="mail">Courriel</label>  
						<div 		class="col-md-4">
							<input 	class="form-control input-sm" id="mail" name="mail" type="email" value="<?= $user['courriel'] ?>" required="">
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
<!-- 2EM PARTIE -->
		<div class="col-md-7" >
			<p>Vous trouverez sur cette page toutes les informations utiles pour la rentrée 2014 en sélectionnant l'année qui vous concerne. Vous pouvez télécharger chaque fichier (format 
				<a href="http://get.adobe.com/fr/reader/" target="_blank">PDF</a>) ou bien l'ensemble des fichiers (format 
				<a href="http://www.7-zip.org/" target="_blank">ZIP</a>) pour l'année choisie. A imprimer avec modération...
			</p>
			<hr>
			<div 					class="row">
				<div 				class="col-md-10 col-md-offset-1">
					<div 			class="form-group">
						<label 		class="col-md-4 control-label" for="SelectPromo">Choisissez votre année : </label>
					  	<div 		class="col-md-8 input-group">
					    	<select class="form-control" id="SelectPromo" name="SelectPromo">
					      		<option selected disabled >Séléctionnez une promo</option>
						    </select>
						</div>
					</div>
					<div 			class="table-responsive">
						<table 		class="table">
							<thead>
								<th>#</th>
								<th>Ci-dessous, les <span class="red" id="files_count"></span> documents disponibles...</th>
								<th>Fichiers</th>
							</thead>
							<tbody id="conteneur">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div 			class="row">
				<p><b id="promo_libelle"></b>
				Télécharger tous les fichiers</p>
				<a 			class="col-xs-4 col-xs-offset-5" href="#" id="promo_zip_link">
					<img 	class="img-responsive extension_zip" src="../images/zip.png">
				</a>
			</div>	
		</div>
	</div>
<?php end_content_for(); ?>
<?php content_for('js_foot'); ?>
	<script type="text/javascript" src="../JS/view_documents.js"></script>
<?php end_content_for(); ?>