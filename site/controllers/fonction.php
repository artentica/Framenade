<?php
	//session_start();
	//require_once("bdd.php");
	
	function bdd_fonction()
	{
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
			case 'zip':
				zipping();
				break;
			default:
				# code...
				break;
		}
	}
	function DBListe_promo()
	{
		$reponse = array();
		connect();
		$temp = DBQuery("SELECT libelle, id FROM promo");
		/*foreach ($temp as $key => $value) 
		{
			array_push( $reponse, $value[0]);
		}*/

		return json_encode( $temp );
	}
	function DBListe_files( $promo )
	{
		$reponse = array();
		connect();
		$temp = DBQuery("SELECT * from document 
		                 WHERE promo='$promo' 
		                 	OR promo=( SELECT id FROM promo WHERE libelle='All' ) 
		                 ORDER BY promo DESC, rang ASC");
		foreach ($temp as $key => $value) 
		{
			array_push( $reponse, $value);
		}
		return json_encode( $reponse );
	}
	function save_data()
	{
		if ( 	!empty($_POST['nom_fils'])	// SI LE FORMULAIRE EST BIEN REMPLI
		    && 	!empty($_POST['prenom_fils'])
		    && 	!empty($_POST['date'])
		    && 	!empty($_POST['tel'])
		    && 	!empty($_POST['mail'])			)
		{
			$alertType = "success";

			define('nom_fils', 		$_POST['nom_fils']);	//ATTRIBUTION DE TOUTES LES VARIABLES
			define('prenom_fils', 	$_POST['prenom_fils']);
			define('ddn_fils', 		$_POST['date']);
			define('tel', 			$_POST['tel']);
			define('courriel', 		$_POST['mail']);
			define('dateI', 		date('y-m-d H:i:s'));
			define('identifiant', 	$_SESSION['mail']);
			define('ip', 			$_SERVER['REMOTE_ADDR']);

			connect();
			if( DBQuery("SELECT id FROM data WHERE identifiant='" . identifiant . "'")==NULL )
			{
				$content = ("L'utilisateur a bien été créer ".identifiant);
				DBInsert("INSERT INTO data (
				        identifiant, nom_fils, prenom_fils, ddn_fils, tel_mobile, courriel, date, ip) 
						VALUES 
						('". identifiant ."', '". nom_fils ."', '". prenom_fils ."', '".
				        ddn_fils ."', '". tel ."', '". courriel ."', '". dateI ."', '". ip ."')");
			}
			else
			{
				$content = "Les modifications ont bien été prises en compte.";
				DBInsert( "UPDATE data
								SET nom_fils='".	nom_fils."',
								prenom_fils='".		prenom_fils."',
								ddn_fils='".		ddn_fils."',
								tel_mobile='".		tel."',
								courriel='".		courriel."',
								date='".			dateI."',
								ip='".				ip."' 
								WHERE identifiant='". identifiant ."'" );
			}
		}
		else
		{
			$alertType = "danger";
		}
		echo('<div class="alert alert-'. $alertType .' alert-dismissible animated zoomInUp" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
				'. $content .'
			</div>');
	}
	function zipping()
	{

	}
?>