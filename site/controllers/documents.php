<?php
	function renseignement()
	{
		if( $_SESSION['connect'] == false )
		{
			header('Location:../index.php');
		}
		include('../include/bdd.php');

		set ('page_title', 'Renseignements');

		$users = DBQuery("SELECT * FROM data WHERE courriel='". $_SESSION['mail'] ."'");

		if( !empty($users[0]) )
			set( 'user', $users[0] );
		else{
			set( 'user', array(
			    "nom_fils"		=>"",
			    "prenom_fils"	=>"",
			    "tel_mobile"	=>"",
			    "courriel"		=>"",
			    "identifiant"	=>""
			));
		}

		$dates = ( !empty($users[0]) ) ? strtotime( $users[0]['date'] ) : "";
		set('date', date( 'Y-m-d', $dates ) );
		return html ('renseignement.html.php', 'layout.html.php');
	}
?>