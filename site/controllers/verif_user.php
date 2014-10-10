<?php
	//TEMPORAIRE
	define('MOT_DE_PASSE', 'motdepasse');
	
	function verification_user()
	{
		if ( !empty($_POST['mail']) && !empty($_POST['password']) ) //TESTE SI LES VARIABLES SONT PASSEES
		{
			$_SESSION['mail'] = $_POST['mail'];

			$_SESSION['connect'] = ($_POST['password'] == MOT_DE_PASSE )? true:false;
			//VERIF SI MOT DE PASSE CORRESPOND AU DEFINE

			if( $_SESSION['connect'] )
			{
				header("Location:../index.php/documents");
			}
		}
		
		header('Location:../index.php');
	}
?>