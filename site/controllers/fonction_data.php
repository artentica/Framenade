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
		}
	}
	function list_data()
	{
		connect();
		$temp = DBQuery('SELECT * FROM data ORDER BY nom_fils');

		return json_encode( $temp );
	}
	function remove($id)
	{
		connect();
		if( DBInsert('DELETE FROM data WHERE id=' . $id) == 1 )// ca a marcher
		{
			$content = "Les données de l'étudiant ont bien été supprimer.";
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
?>
