<?php
	function renseignement()
	{

		if( !$_SESSION['connect'])
		{
			header('location:index.php/login');
		}

		set ('page_title', 'Renseignements');
		return html ('renseignement.html.php', 'layout.html.php');
	}
?>