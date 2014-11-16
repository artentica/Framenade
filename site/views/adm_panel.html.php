<?php content_for('link'); ?>
	<link rel="stylesheet" href="css/animate.css">
	<!--link rel="stylesheet" href="css/jquery-ui.theme.min.css"-->
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/adm_panel.css">
<?php end_content_for() ?>
<?php content_for('body'); ?>
	<div class="row" id="main-container">
		<h1 class="col-xs-12 text-center">Gestion des fichiers</h1>

		<div class="col-sm-8 col-sm-offset-2" id="notification"></div>

		<div class="subPanel col-md-5 text-center">
			<h4>Gestion des promos</h4><hr>
			<div class="panel panel-default">
				<table class="text-left table table-striped table-hover" id="list_promos" >

				</table>
			</div>
		</div>

		<div class="subPanel col-md-2 text-center">
			<h4>Menu</h4><hr>
			<button class="btn btn-success btn-block" id="add-promo">
				<i class="glyphicon glyphicon-plus-sign"></i> Ajouter une promo
			</button>
			<button class="btn btn-inverse btn-block disabled">
				<i class="glyphicon glyphicon-plus-sign"></i> Ajouter un fichier
			</button>
		</div>

		<div class="subPanel col-md-5 text-center">
			<h4>Gestion des fichiers</h4><hr>
		</div>
	</div>



<?php end_content_for() ?>
<?php content_for('js_foot'); ?>
	<script type="text/javascript" src="js/dropzone.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/adm_panel.js"></script>
<?php end_content_for() ?>
