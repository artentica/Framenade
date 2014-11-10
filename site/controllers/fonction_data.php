<?php
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


//   JSON DE TOUTES LES VALEURS
	function list_data()
	{
		connect();
		return json_encode( DBQuery('SELECT * FROM data ORDER BY nom_fils') );
	}


//   SUPPRIME UN ENREGISTREMENT
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


//  RECUPERE LES INFOS D UN UTILISATEUR
	function userInfo($id)
	{
		connect();
		return json_encode( DBQuery('SELECT * FROM data WHERE id=' . $id ) );
	}

//  MODIFIE LES DONNEES RENTREES
	function edition()
	{
		$temp = json_encode (print_r($_POST) );
		return $temp;
	}
?>
