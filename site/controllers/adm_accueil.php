<?php

	function adm_accueil()
	{
		if( isset($_SESSION['connect_adm']) && $_SESSION['connect_adm'] == true )
		{
			header('Location:' . url_for('/administration_panel') );
		}
		set ('page_title', 'Accueil administration');
		return html ('adm_accueil.html.php', 'layout_admin.html.php');
	}
?>