<?php
	function renseignement()
	{
		if( $_SESSION['connect'] == false )
		{
			header('Location:../index.php');
		}
		include('../include/bdd.php');

		set ('page_title', 'Renseignements');

		set( 'user', query("SELECT * FROM data WHERE courriel='". $_SESSION['mail'] ."'") );

		return html ('renseignement.html.php', 'layout.html.php');
	}
?>