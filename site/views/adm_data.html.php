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
	  <div id="notification"></div>
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
<?php end_content_for() ?>
<?php content_for('js_foot'); ?>
	<script type="text/javascript" src="js/adm_data.js"></script>
<?php end_content_for() ?>
