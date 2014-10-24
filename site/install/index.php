<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" 
			type="text/javascript" 
			charset="utf-8" async defer>
		</script>
		<style type="text/css">
		#result_test
		{
			margin-top: 25px;
		}
		#loading
		{
			position: fixed;
			box-shadow: 0px 0px 2000px 100px rgba(0,0,0,0.5);
			border-radius: 200%;
			top: 35%;
			left: 45%;
		}
		</style>
	</head>
	<body class="container">
		<div class="col-sm-4 col-sm-offset-4">
			<h1>début de l'installation:</h1>
			<form id="formulaire" method="POST" action="write_file.php" >
				<label for="dbhost">Adresse du serveur de la base de donnée:</label>
				<input 	class="form-control" type="text" name="dbhost" required>

				<label for="dbname">Nom de la base de donnée:</label>
				<input 	class="form-control" type="text" name="dbname" required>

				<label for="dbuser">Nom d'utillisateur pour cette base:</label>
				<input 	class="form-control" type="text" name="dbuser" required>

				<label for="dbpass">Mot de passe correspondant:</label>
				<input 	class="form-control" type="text" name="dbpass">
				<hr>
				<label for="dbpass">Mot de passe de l'application</label>
				<input 	class="form-control" type="text" name="appPass">
				<hr>
				<button class="btn btn-success col-md-5" id="validator"><i class="icon-white icon-ok"></i>Tester</button>
				<input 	class="btn btn-primary col-md-5 col-md-offset-2" type="submit" value="Enregistrer">
			</form> 
			<hr>	
			<div class="col-sm-12" id="result_test"></div>
		</div>
		<img id="loading" src="../Images/loading.gif">
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function(){
			$('#loading').hide();

			$('#validator').click( function(e) 
			{
				e.preventDefault();
				$('#loading').show();
		        var $form = $('#formulaire'); // L'objet jQuery du formulaire

	            $.ajax(
	            {
	                url: 'try_connect.php', // Le nom du fichier indiqué dans le formulaire
	                type: 'GET', // La méthode indiquée dans le formulaire (get ou post)
	                data: $form.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
	                success: function(html) 
	                { // Je récupère la réponse du fichier PHP
	                    $('#result_test').html( html ); // J'affiche cette réponse
	                    $('#loading').hide();
	                },
	                error: function()
	                {
	                	$('#result_test').text( 'Impossible de lancer la requete.' );
	                }
	            });
		    });
		});
	</script>
</html>
