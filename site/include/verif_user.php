<?php	
	session_start();
	//TEMPORAIRE
	define('MOT_DE_PASSE', 'motdepasse');
	if ( !empty($_POST['mail']) && !empty($_POST['password']) ) //TESTE SI LES VARIABLES SONT PASSEES
	{
		$_SESSION['mail'] = $_POST['mail'];

		$_SESSION['connect'] = ($_POST['password'] == MOT_DE_PASSE )? true:false;
		//VERIF SI MOT DE PASSE CORRESPOND AU DEFINE

		if( $_SESSION['connect'] )
		{
			header("Location:../index.php/documents");
		}
		else
			header("Location:../index.php");
	}
	else
		header("Location:../index.php");
?>