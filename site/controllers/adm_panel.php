<?php
	function adm_panel()
	{
		if( empty( $_SESSION['connect_adm'] ))
		{		
			if ( !empty($_POST['pass']) && $_POST['pass'] == '1234')
				$_SESSION['connect_adm'] = true;
			else
				$_SESSION['connect_adm'] = false;
		}


		if( $_SESSION['connect_adm'] == false )
		{
			flash(0, 'has-error');
			header("location:" . url_for('/administration_accueil'));
		}

		set('page_title', 'Panel de gestion');
		return html ('adm_panel.html.php', 'Layout_admin_panel.php');
	}

?>