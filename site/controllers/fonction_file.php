<?php
	/**
	 * PERMET DE REPARTIR EN FONCTION DE L ACTION VOULUE
	 */
	function fonction_file()
	{
		$action = params('action');
		$id		= params('id');

		switch ($action)
		{
			case 'edit_promo':
				echo edit_promo($id);
				break;
		}
	}

/*=====================================================================
				GESTION DES PROMOS
=====================================================================*/

	/**
	 * MODIFIE LE NOM DE LA PROMO
	 * @param Number $id ID de la promo a modifier
	 */
	function edit_promo($id)
	{

	}
	/**
	 * SUPPRIME LA PROMO SPECIFIEE
	 * @param [[Type]] $id ID de la promo a supprimer
	 */
	function remove_promo($id)
	{

	}
	/**
	 * AJOUTE UNE PROMO A LA LISTE DES PROMOS
	 * @$_POST	promo_name
	 */
	function add_promo()
	{

	}


/*=====================================================================
				GESTION DES PROMOS
=====================================================================*/

	function add_file($id)//id promo
	{

	}
	function remove_file($id)//id file
	{

	}
	function change_rang()
	{

	}
?>
