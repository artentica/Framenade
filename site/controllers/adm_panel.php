<?php
	function adm_panel()
	{
		echo 'test';
		if( empty($_POST['pass']) OR $_POST['pass'] != '1234')
		{
			flash(0, 'has-error');
			header("location:" . url_for('/administration_accueil'));
		}
	}

?>