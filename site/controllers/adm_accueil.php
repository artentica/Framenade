<?php

function adm_accueil(){

	set ('page_title', 'Accueil administration');
	return html ('adm_accueil.html.php', 'layout_admin.html.php');
}

?>