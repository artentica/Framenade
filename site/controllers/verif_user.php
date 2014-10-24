<?php	
	function verif_user()
	{
		if ( !empty($_POST['mail']) && !empty($_POST['password']) ) //TESTE SI LES VARIABLES SONT PASSEES
		{
			$_SESSION['mail'] = $_POST['mail'];

			$_SESSION['connect'] = ($_POST['password'] == appPass )? true:false;
			/*VERIF SI MOT DE PASSE CORRESPOND AU DEFINE
				appPass est le mot de passe pour se connecter a l'appli en tant 
				qu'élève, il est definit dans lib/config.php
			*/

			if( $_SESSION['connect'] )
			{
				header( 'Location:' . url_for('/documents') );
			}
			else
				header('Location:' . url_for('/'));
		}
		else
			header('Location:' . url_for('/'));
	}
?>