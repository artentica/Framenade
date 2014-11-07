<?php
	/*
				FONCTIONS REUTILISEES SOUVENT
	*/

	function is_log()
	{
		if( empty($_SESSION['connect_adm']) OR $_SESSION['connect_adm'] == false )
		{
			flash(0, 'has-error');
			header('Location:' . url_for('/administration_accueil') );
		}
	}
?>