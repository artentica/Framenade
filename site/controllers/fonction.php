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
			case 'exist_user':
				echo exist_user();
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
			if( DBQuery("SELECT id FROM data WHERE identifiant='" . identifiant . "'") )
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
				if( !DBInsert( "UPDATE data
								SET nom_fils='".	nom_fils."',
								prenom_fils='".		prenom_fils."',
								ddn_fils='".		ddn_fils."',
								tel_mobile='".		tel."',
								courriel='".		courriel."',
								date='".			dateI."',
								ip='".				ip."' 
								WHERE identifiant='". identifiant ."'" ))
				{
					$alertType 	= "danger";
					$content 	= "Impossible de traiter la demande";
				}
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
		$id 			= $_GET['promo'];
		//$zipLibelle 	= DBQuery("SELECT libelle FROM promo WHERE id='" . $id . "'" )[0][0] . ".zip";
		$zipLibelle 	= 'zip/documents_' . $id . '.zip'; 
		//LIBELLE DE LA PROMO EN FONCTION DE SON ID
		$files 			= DBQuery('SELECT fichier FROM document WHERE promo=18 OR promo=' . $id);
		$zip 			= new ZipArchive();

		//print_r($files);

		if ($zip->open( $zipLibelle, ZipArchive::CREATE)!==TRUE) 
		{
		    exit("Impossible d'ouvrir le fichier <$zipLibelle>\n");
		}
		else
		{
			foreach ($files as $k => $file)
			{
				$zip->addFile( "pdf/" . $file[0] );
			}
			//echo "Nombre de fichiers : " . $zip->numFiles . "\n";
			//echo "Statut :" . $zip->status . "\n";
			$zip->close();
		}
		header('Content-type: application/zip');
		header('Expires: 0');
		header("Content-Length: ".filesize( $zipLibelle ));
		header('Content-Disposition: attachment; filename="'. $zipLibelle .'"');

		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header("Content-Transfer-Encoding: binary");
		    header('Pragma: public');
		} else {
		    
		    header("Content-Transfer-Encoding: binary");
		    header('Pragma: no-cache');
		    
		}
		readfile( $zipLibelle );
	}
	/*function exist_user()
	{
		return 'false';
	}*/
?>