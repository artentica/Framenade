<?php
	function renseignement()
	{
		$mail = params('email'	);
		$mdp  = params('mdp'	);

		set ('page_title', 'Renseignements');
		return html ('renseignement.html.php', 'layout.html.php');
	}
?>