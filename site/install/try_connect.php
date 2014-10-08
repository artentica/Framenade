<?php
	function succes( $str )
	{
		return '<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  				'.	$str	.'</div>';
	}
	function fail( $str )
	{
		return '<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  				'.	$str	.'</div>';
	}


	if(   !empty( $_GET["dbhost"] )
	   && !empty( $_GET["dbname"] )
	   && !empty( $_GET["dbuser"] )
	)
	{	// Y A TOUT ON Y VA !!!

		try
		{
			$string = new PDO('mysql:host='. $_GET["dbhost"] 
			              .';dbname='. $_GET["dbname"] 
			              .';charset=UTF-8', 
			              $_GET["dbuser"],
			              $_GET["dbpass"] );
			$mess = succes('La connexion a réussi, vous pouvez valider les paramètres.</p>');
		}
		catch ( PDOException $e )
		{
			$mess = fail('La connexion a la base de donnée n\'a pas fonctionnée...');
		}
	}
	else
	{
		$mess = fail('Toutes les données n\'ont pas été envoyer.');
		//print_r($_GET);
	}
	echo $mess;
?>