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
	 * @returns [[Type]] [[Description]]
	 */
	function list_promo()
	{
		return json_encode( DBQuery("SELECT id, libelle FROM promo ORDER BY LIBELLE ASC") );
	}


	/**
	 * RENVOI TOUTS LES DOCUMENTS SPECIFIQUES A UNE PROMO
	 * @param   [[Type]] $id [[Description]]
	 * @returns [[Type]] [[Description]]
	 */
	function list_promo_files( $id )
	{
		return json_encode( DBQuery("SELECT * FROM document WHERE promo=$id ORDER BY libelle"));
	}


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
			$file 		= $_FILES['fichier'];
		   	$promo 		= $_POST['promo'];
		   	$libelle 	= $_POST['libelle'];

			$dossier 		= 'pdf/';
			$fichier 		= basename($file['name']);
			$taille_maxi 	= 100000;
			$taille 		= filesize($file['tmp_name']);
			$extensions 	= array('.png', '.gif', '.jpg', '.jpeg', '.pdf');
			$extension 		= strrchr($file['name'], '.');


			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
				 $content = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
			}
			if($taille>$taille_maxi)
			{
				 $content = 'Le fichier est trop gros...';
			}
			if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
			{
				 //On formate le nom du fichier ici...
				 $fichier = strtr($fichier,
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
				 if(move_uploaded_file($file['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				 {
					$last_id = DBQuery("SELECT rang FROM document WHERE promo=$promo ORDER BY rang DESC");
					if( $DBInsert("INSERT INTO document (rang, promo, libelle, fichier )
									VALUES (". ($last_id + 1) .", $promo, $libelle, $fichier )"))
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


	function change_rang($id)//id de la promo
	{

	}


	function change_name($id)//id du fichier
	{

	}
?>
