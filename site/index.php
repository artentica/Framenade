<?php
	require_once( 'include/limonade.php' );

	option('limonade_dir', 'include/'); // this fiolder contains the limonade.php main file


/*
========================================================================
NECESSAIRE A L INSTALLATION
========================================================================
*/
	dispatch('/clean_install'				, 'clean_install'); //UNIQUEMENT NECESSAIRE A L INSTALLATION
/*
========================================================================
GESTION DES UTILISATEURS ET DE LEUR CONNEXION
========================================================================
*/
	dispatch('/logout'						, 'logout');
	dispatch_post('/verifUser'				, 'verif_user');	//VERIFIE INFO UTILISATEUR ET REDIRIGE SUR LA BONNE PAGE

	dispatch('/fonction'					, 'bdd_fonction');	//INTERFACE ELEVE: GET => liste des fichiers POST => sauvegarder les informations de l'utilisateur
	dispatch_post('/fonction'				, 'bdd_fonction');	
/*
========================================================================
PAGES POUR LES ETUDIANTS
========================================================================
*/
	dispatch('/'							, 'login');
	dispatch('/documents'					, 'renseignement');

/*
========================================================================
PAGES POUR LES PROFESSEURS
========================================================================
*/
	dispatch_post('/administration_panel'	, 'adm_panel');
	dispatch('/administration_accueil'		, 'adm_accueil');
	dispatch('/administration_panel'		, 'adm_panel');
	dispatch('/administration_data'			, 'adm_data' );
	
	dispatch('/fonction_data/:action/:id'		, 'fonction_data');

	run();
?>

