<?php
	/**
	 * PERMET DE REPARTIR EN FONCTION DE L ACTION VOULUE
	 */
	function fonction_file()
	{
		is_log();
		$action = params('action');
		$id		= params('id');

		echo $action( $id );
		/*switch ($action)
		{
			case 'add_promo':
				echo add_promo($id);
				break;
			case 'remove_promo':
				echo remove_promo($id);
				break;
			case 'edit_promo':
				echo edit_promo($id);
				break;
			case 'edit_promo':
				echo edit_promo($id);
				break;
			case 'edit_promo':
				echo edit_promo($id);
				break;
			case 'edit_promo':
				echo edit_promo($id);
				break;

		}*/
	}

/*=====================================================================
				GESTION DES PROMOS
=====================================================================*/

	/**
	 * AJOUTE UNE PROMO A LA LISTE DES PROMOS
	 * @$_POST	promo_name
	 */
	function add_promo()
	{
		$style 		= 'danger';
		$content 	= 'Impossible de créer cette promotion.';

		if( !empty($_POST['promo_name'] )
		   	&& DBInsert('INSERT INTO document (libelle) VALUES `' . $_POST['promo_name'] . '`') )
		{
			$style 		= 'success';
			$content 	= 'La promotion ' . $_POST['promo_name'] . ' à bien été créée.';
		}
		return notif( $style, $content );
	}
	/**
	 * SUPPRIME LA PROMO SPECIFIEE
	 * @param [[Type]] $id ID de la promo a supprimer
	 */
	function remove_promo($id)
	{
		$style 		= 'danger';
		$content 	= 'Impossible de supprimer cette promotion.';

		if( DBInsert("DELETE FROM promo WHERE id=$id "))
		{
			$style 		= 'success';
			$content 	= 'La promotion à bien été supprimé.';
		}
		return notif( $style, $content );
	}
	/**
	 * MODIFIE LE NOM DE LA PROMO
	 * @param Number $id ID de la promo a modifier
	 */
	function edit_promo($id)
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
	function change_rang($id)//id de la promo
	{

	}
	function change_name($id)//id du fichier
	{

	}
?>
