<?php
	require_once("bdd.php");

	switch ($_GET['search']) 
	{
		case 'promos':
			echo DBListe_promo();
			break;
		case 'files':
			echo DBListe_promo($_GET['promo']);
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
	function DBListe_promo( $promo )
	{
		$reponse = array();
		connect();
		$temp = DBQuery("SELECT * from document where promo='$promo'");
		foreach ($temp as $key => $value) {
			array_push( $reponse, $value[0]);
		}

		return json_encode( $reponse );
	}
?>