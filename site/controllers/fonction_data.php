<?php
	function fonction_data()
	{
		$action = params('action');
		
		switch ( $action ) 
		{
			case 'list_data':
				echo list_data();
				break;
		}
	}
	function list_data()
	{
		connect();
		$temp = DBQuery('SELECT * FROM data ORDER BY nom_fils');

		return json_encode( $temp );
	}
?>
