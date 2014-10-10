<?php
	function renseignement()
	{

		$mail = $_POST['mail'];
		$mdp  = $_POST['mdp'];

		

		set ('page_title', 'Renseignements');
		return html ('renseignement.html.php', 'layout.html.php');
	}
?>