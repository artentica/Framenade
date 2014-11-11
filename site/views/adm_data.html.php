<?php content_for('link'); ?>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/adm_data.css">
<?php end_content_for() ?>
<?php content_for('body'); ?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Données rentrées par les élèves</div>
	  <div class="panel-body">
		  <label for="search">Recherche par nom:</label>
		  <input type="text" name="search" id="search_nom" />
	  </div>
	  <div id="notification" class="col-sm-8 col-sm-offset-2"></div>
	  <!-- Table -->
	  <table class="table">
		  <thead>
			  <tr>
			  	<th>Nom</th>
			  	<th>Identifiant</th>
				<th>Telephone</th>
				<th>E-mail</th>
				<th>Date de naissance</th>
				<th>IP</th>
				<th>Action</th>
			  </tr>
		  </thead>
		  <tbody id="table_data">
		  </tbody>
	  </table>
	</div>
</div>
<div id="lightbox" class="col-sm-6 col-sm-offset-3">
	<form class="form-horizontal" action="#">
		<input id="id" type="hidden" name="id" value="">
		<fieldset>
			<!-- Form Name -->
			<legend><h3>Modification des données de l'étudiant</h3></legend>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-5 control-label" for="nom_fils">Nom:</label>
			  	<div class="col-md-5">
			  		<input id="nom_fils" name="nom_fils" type="text" class="form-control input-md" required="">
			  	</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  	<label class="col-md-5 control-label" for="prenom_fils">Prénom:</label>
			  	<div class="col-md-5">
			  		<input id="prenom_fils" name="prenom_fils" type="text" class="form-control input-md" required="">
			  	</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-5 control-label" for="identifiant">Identifiant</label>
			  	<div class="col-md-5">
			  		<input id="identifiant" name="identifiant" type="text" class="form-control input-md" required="">
			  	</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-5 control-label" for="tel_mobile">Téléphone:</label>
			  	<div class="col-md-5">
			  		<input id="tel_mobile" name="tel_mobile" type="text" class="form-control input-md" required="">
			  	</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-5 control-label" for="courriel">E-mail</label>
			 	<div class="col-md-5">
			  		<input id="courriel" name="courriel" type="text" class="form-control input-md" required="">
			  	</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-5 control-label" for="ddn_fils">Date de naissance</label>
				<div class="col-md-5">
			  		<input id="ddn_fils" name="ddn_fils" type="text" class="form-control input-md" required="">
			  		<span class="help-block">Format: "AAAA-MM-JJ"</span>
			  </div>
			</div>
			<!-- Button (Double) -->
			<div class="form-group">
			  <div class="col-md-6 col-md-offset-4">
				<button id="save"   class="btn btn-success">Enregistrer</button>
				<button id="cancel" class="btn btn-danger">Annuler</button>
			  </div>
			</div>
		</fieldset>
		</form>
</div>
<?php end_content_for() ?>
<?php content_for('js_foot'); ?>
	<script type="text/javascript" src="js/adm_data.js"></script>
<?php end_content_for() ?>
