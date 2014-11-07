<?php
	function adm_data()
	{
		is_log();
		
		set('page_title', 'Panel de gestion des données');
		return html('adm_data.html.php', 'Layout_admin_panel.php');
	}
?>