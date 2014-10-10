<?php
	require_once( 'include/limonade.php' );
	require_once( 'include/bdd.php');
<<<<<<< HEAD
	option('limonade_dir', 'include/'); // this folder contains the limonade.php main file
	dispatch('/clean_install', 'clean_install');

			
	dispatch('/','login');
	dispatch('/verif_user', 'verification_user');
	dispatch('/documents', 'renseignement');

	run();
?>
=======
	option('limonade_dir', 'include/'); // this fiolder contains the limonade.php main file

	dispatch('/clean_install', 'clean_install');

	
	dispatch('/','login');
	dispatch('/verif_user', 'verification_user');
	dispatch('/documents', 'renseignement');


	run();
?>
>>>>>>> dc32a7669bd39a5807c276a829ffdcc3a98fbc47
