<?php
	require_once( 'include/limonade.php' );

	option('limonade_dir', 'include/'); // this fiolder contains the limonade.php main file

	dispatch('/clean_install'			, 'clean_install'); //UNIQUEMENT NECESSAIRE A L INSTALLATION

	dispatch('/'						, 'login');

	dispatch_post('/verifUser'			, 'verif_user');	//VERIFIE INFO UTILISATEUR ET REDIRIGE SUR LA BONNE PAGE

	dispatch('/fonction'				, 'bdd_fonction');	//INTERFACE ELEVE: GET => liste des fichiers POST => sauvegarder les informations de l'utilisateur
	dispatch_post('/fonction'			, 'bdd_fonction');

	dispatch('/documents'				, 'renseignement');

	dispatch('/administration_accueil'	, 'adm_accueil');

	run();
?>

