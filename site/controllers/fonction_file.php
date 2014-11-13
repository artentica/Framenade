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
	}

/*==========================================================================================
									GESTION DES PROMOS
==========================================================================================*/

	/**
	 * RENVOI SOUS FORMAT JSON TOUTE LES PROMOS
	 * @returns Object JSON de la liste des promos
	 */
	function list_promo()
	{
		return json_encode( DBQuery("SELECT id, libelle FROM promo ORDER BY LIBELLE ASC") );
	}


	/**
	 * RENVOI TOUTS LES DOCUMENTS SPECIFIQUES A UNE PROMO
	 * @param   Number   $id Numero de la promo
	 * @returns Object Json de la liste des fichiers pour la promo
	 */
	function list_promo_files( $id )
	{
		return json_encode( DBQuery("SELECT * FROM document WHERE promo=$id ORDER BY libelle"));
	}


	/**
	 * AJOUTE UNE PROMO A LA LISTE DES PROMOS
	 * @returns String HTML de la notification
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
	 * @param Number $id ID de la promo a supprimer
	 * @returns String HTML de la notif
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
		$style 		= 'danger';
		$content 	= 'Impossible de modifier cette promotion.';

		if( !empty($_POST['new_name']) && DBInsert('UPDATE promo SET libelle=`' . $_POST['new_name'] . '`') )
		{
			$style 		= 'success';
			$content 	= 'Le nom de la promotion est maintenant ' . $_POST['new_name'] . '.';
		}
		return notif( $style, $content );
	}


/*==========================================================================================
									GESTION DES PROMOS
==========================================================================================*/

	function add_file($id)//id promo
	{
		$style 		= 'danger';
		$content 	= 'Impossible de modifier cette promotion.';

		if( 	!empty($_FILES['fichier'])
		   && 	!empty($_POST['promo'])
		   &&	!empty($_POST['libelle'])  )
		{
			$file 			= $_FILES['fichier'];
		   	$promo 			= $_POST['promo'];
		   	$libelle 		= $_POST['libelle'];

			$dossier 		= 'pdf/';
			$fichier 		= basename($file['name']);
			$taille_maxi 	= 100000;
			$taille 		= filesize($file['tmp_name']);
			$extensions 	= array('.png', '.gif', '.jpg', '.jpeg', '.pdf');
			$extension 		= strrchr($file['name'], '.');


			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
				 $content = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf...';
			}
			else if($taille>$taille_maxi)
			{
				 $content = 'Le fichier est trop gros...';
			}
			else //S'il n'y a pas d'erreur, on upload
			{
				 //On formate le nom du fichier ici...
				 $fichier = strtr($fichier,
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

				 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

				//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				 if( move_uploaded_file($file['tmp_name'], $dossier . $fichier) )
				 {
					$temp 		= DBQuery("SELECT rang FROM document WHERE promo=$promo ORDER BY rang DESC");
					$new_id 	= ($temp[0][0]) + 1;
					if( $DBInsert("INSERT INTO document (rang, promo, libelle, fichier )
									VALUES ( $new_id , $promo, $libelle, $fichier )"))
					{
						$style 		= 'success';
						$content 	= "Le chichier $libelle à bien été ajouté.";
					}
				 }
				 else //Sinon (la fonction renvoie FALSE).
				 {
					  $content 	=  "Echec de l'upload du fichier.";
				 }
			}
		}
		return notif( $style, $content );
	}

	/**
	 * SUPPRIME LE FICHIER EN FONCTION DE L ID
	 * @param Number $id ID du fichier a supprimer
	 */
	function remove_file($id)//id file
	{
		$style 		= 'danger';
		$content 	= "Le fichier n'a pas été supprimé.";
		if( DBInsert("DELETE FROM document WHERE id=$id"))
		{
			$style 		= 'success';
			$content 	= "Le fichier a bien été supprimé.";
		}
		return notif($style, $content);
	}

	/**
	 * CHANGE LE RANG DE CHACUN DES ELEMENTS D UNE PROMO
	 * @param Number $id ID de la promo a réorganiser
	 */
	function change_rang($id)//id de la promo
	{
		if( !empty( $_POST['new_list']) )
		{
			foreach( $_POST['new_list'] as $Nid => $file )
			{
				if( !DBInsert("UPDATE document SET rang=$Nid WHERE id=$file") )
				{
					$content = "Une erreur c'est produite, puvez vous réessayez?";
					break;
				}
				$style 		= 'success';
				$content 	= "La modification de l'ordre des fichiers est terminée.";
			}

		}
		return notif($style, $content );
	}

	/**
	 * CHANGE LE NOM D UN FICHIER
	 * @param Number $id ID du fichier à renommer
	 */
	function change_name($id)//id du fichier
	{
		$style = 'danger';
		$content = "Impossible de renommer ce fichier";

		if( DBInsert("UPDATE document SET libelle=". $_POST['new_name'] ." WHERE id=$id") )
		{
			$style 		= 'success';
			$content 	= "Le fichier à " . $_POST['new_name'] . " à bien été renommer.";
		}
		return notif( $style, $content );
	}
?>
