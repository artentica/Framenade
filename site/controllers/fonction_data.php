<?php
	/**
	 * PERMET DE REPARTIR EN FONCTION DES INFOS VOULUE
	 */
	function fonction_data()
	{
		$action = params('action');
		$id		= intVal(params('id'));
		
		switch ( $action ) 
		{
			case 'list_data':
				echo list_data();
				break;
			case 'remove':
				echo remove($id);
				break;
			case 'userInfo':
				echo userInfo($id);
				break;
			case 'edition':
				echo edition();
				break;
		}
	}

	/**
 	* JSON DE TOUTES LES VALEURS
 	* @returns Object JSON du tableau avec la liste des étudiants
 	*/
	function list_data()
	{
		return json_encode( DBQuery('SELECT * FROM data ORDER BY nom_fils') );
	}


	/**
 	* SUPPRIME UN ENREGISTREMENT
 	* @param   Number $id identifiant de l'etudiant
 	* @returns String marché/pas marché
 	*/
	function remove($id)
	{
		connect();
		if( DBInsert('DELETE FROM data WHERE id=' . $id) == 1 )// ca a marcher
		{
			$content = "Les données de l'étudiant ont bien été supprimées.";
			$style   = "success";
		}
		else
		{
			$content = "Impossible de supprimer les données, contactez l'administrateur.";
			$style   = "danger";
		}
		return '<div class="alert alert-' . $style . ' alert-dismissible" role="alert">
			  		<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
			  			<span class="sr-only">Close</span>
					</button>'. $content .'
				</div>';
	}


	/**
	 * RECUPERE LES INFOS D UN UTILISATEUR
	 * @param   Number $id ID de l'etudiant à modifier
	 * @returns Object JSON de l'étudiant concerné
	 */
	function userInfo($id)
	{
		return json_encode( DBQuery('SELECT * FROM data WHERE id=' . $id ) );
	}

	/**
	 * MODIFIE LES DONNEES RENTREES
	 * @returns String marché /pas marché
	 */
	function edition()
	{
		//$temp = json_encode (print_r($_POST) );
		$style 		= 'danger';
		$content 	= 'Erreur dans le remplissage du formulaire';
		if (!empty($_POST['id'])
		   && !empty($_POST['ddn_fils'])
		   && !empty($_POST['prenom_fils'])
		   && !empty($_POST['nom_fils'])
		   && !empty($_POST['identifiant'])
		   && !empty($_POST['tel_mobile'])
		   && !empty($_POST['courriel']))
		{
			// TOUTES LES DONN2ES ONT ETE ENVOYEES
			$test = DBInsert("UPDATE data SET ddn_fils 		= '" . $_POST['ddn_fils'] . "',
									  prenom_fils 	= '" . $_POST['prenom_fils'] . "',
									  nom_fils 		= '" . $_POST['nom_fils'] . "',
									  identifiant 	= '" . $_POST['identifiant'] . "',
									  tel_mobile 	= '" . $_POST['tel_mobile'] . "',
									  courriel 		= '" . $_POST['courriel'] . "'
					  WHERE id=" . $_POST['id']);
			if($test)
			{
				$style		= 'success';
				$content 	= 'Les données ont bien été mises à jour pour <b>'
							  . $_POST['prenom_fils']
							  . ' '
							  . $_POST['nom_fils']
							  . '</b>.';
			}
			else
			{
				$content = "Impossible de mettre a jour les données (ou aucune donnée n'a été modifiée).";
			}
		}
		return '<div class="alert alert-' . $style . ' alert-dismissible" role="alert">
			  		<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
			  			<span class="sr-only">Close</span>
					</button>'. $content .'
				</div>';
		//return $temp;
	}
?>
