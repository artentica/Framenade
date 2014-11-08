<?php
	function fonction_file()
	{
		$action = params('action');

		switch ($action)
		{
			case 'edit':
				echo edit();
				break;
		}
	}

	function edit()
	{

	}
?>
