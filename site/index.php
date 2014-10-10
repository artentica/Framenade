<?php
	require_once( 'include/limonade.php' );
	require_once( 'include/bdd.php');
	option('limonade_dir', 'include/'); // this folder contains the limonade.php main file
	dispatch('/clean_install', 'clean_install');

			
	dispatch('/','login');
	dispatch('/verif_user', 'verification_user');
	dispatch('/documents', 'renseignement');

	run();
?>