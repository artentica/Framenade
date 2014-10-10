<?php
	function verification_user()
	{
		if ( !empty( $_POST['mail'] && !empty( $_POST['password'] ) )) //TESTE SI LES VARIABLES SONT PASSEES
		{
			$_SESSION['mail'] = $_POST['mail'];

			$_SESSION['connect'] = ($_POST['password'] == MOT_DE_PASSE )? true:false;

			if( $_SESSION['connect'] )
			{
				header("location:index.php/documents");
			}
			else
			{
				header("location:index.php/documents");
			}
		}
		else
		{
			header('location:index.php/login');
		}
	}
?>