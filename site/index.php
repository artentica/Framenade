<html>
	<head>

	</head>
	<body>
		<?php
			$test = query('SELECT * FROM data');
			print_r($test);
		?>
		PAGE D ACCUEIl

		<?php
			require_once( 'include/limonade.php' );
			option('limonade_dir', 'include/'); // this fiolder contains the limonade.php main file

			dispatch('/clean_install', 'clean_install');

			run();
		?>
	</body>
</html>