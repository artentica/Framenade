<?php
	if(   !empty( $_POST["dbhost"] )
	   && !empty( $_POST["dbname"] )
	   && !empty( $_POST["dbuser"] )
	   && !empty( $_POST["dbpass"] )
	   && !empty( $_POST["appPass"])
	)
	{	// Y A TOUT ON Y VA !!!

		$dbhost  = $_POST["dbhost"];
		$dbname  = $_POST["dbname"];
		$dbuser  = $_POST["dbuser"];
		$dbpass  = $_POST["dbpass"];
		$appPass = $_POST["appPass"];

		require_once('template_config_file.php');

		$config_file = fopen('../include/config.php', 'a+');

		ftruncate($config_file, 0);

		fwrite( $config_file, $template );

		fclose($config_file);

		//header("location:../index.php/clean_install"); //NETTOIE LE DOSSIER
	}
	else //REDIRIGE SUR LE FORMULAIRE SI PAS LES DONNEES
		header("location:index.php");
?>