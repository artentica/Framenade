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
		$temp = DBInsert('DELETE FROM data WHERE id=' . $id);
		return $temp;
	}
?>
