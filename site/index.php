<html>
	<head>

	</head>
	<body>
		PAGE D ACCUEIl

		<?php
			require_once( 'include/limonade.php' );
			option('limonade_dir', 'include/'); // this fiolder contains the limonade.php main file

			dispatch('/', 'login');
			dispatch('/clean_install', 'clean_install');

			

			run();
		?>
	</body>
</html>