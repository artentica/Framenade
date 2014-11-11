<?php
	/**
	 * PERMET DE REPARTIR EN FONCTION DE L ACTION VOULUE
	 */
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
