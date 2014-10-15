<?php
	require_once("bdd.php");

	header('charset=utf-8');

	switch ($_GET['action']) 
	{
		case 'promos':
			echo DBListe_promo();
			break;
		case 'files':
			echo DBListe_files($_GET['promo']);
			break;
		case 'save':
			save_data();
			break;
		default:
			# code...
			break;
	}

	function DBListe_promo()
	{
		$reponse = array();
		connect();
		$temp = DBQuery("SELECT distinct promo FROM document");
		foreach ($temp as $key => $value) {
			array_push( $reponse, $value[0]);
		}

		return json_encode( $reponse );
	}
	function DBListe_files( $promo )
	{
		$reponse = array();
		connect();
		$temp = DBQuery("SELECT * from document where promo='$promo' OR promo='' ORDER BY promo, rang");
		foreach ($temp as $key => $value) {
			array_push( $reponse, $value);
		}

		return json_encode( $reponse );
	}
	function save_data()
	{
		if ( 	!empty($_POST['nom_fils'])
		    && 	!empty($_POST['prenom_fils'])
		    && 	!empty($_POST['date'])
		    && 	!empty($_POST['tel'])
		    && 	!empty($_POST['mail'])			)
		{

		}
	}
?>