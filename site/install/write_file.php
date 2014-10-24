<?php
	if(   isset( $_POST["dbhost"] )
	   && isset( $_POST["dbname"] )
	   && isset( $_POST["dbuser"] )
	   && isset( $_POST["dbpass"] )
	   && isset( $_POST["appPass"])
	   && isset( $_POST["appAdm"] )
	)
	{	// Y A TOUT ON Y VA !!!

		$dbhost  = $_POST["dbhost" ];
		$dbname  = $_POST["dbname" ];
		$dbuser  = $_POST["dbuser" ];
		$dbpass  = $_POST["dbpass" ];
		$appPass = $_POST["appPass"];
		$appAdm  = $_POST["appAdm" ];

		require_once('template_config_file.php');

		$config_file = fopen('../lib/config.php', 'a+');

		ftruncate($config_file, 0);

		fwrite( $config_file, $template );

		fclose($config_file);

		//header("location:../index.php/clean_install"); //NETTOIE LE DOSSIER
	}
	else //REDIRIGE SUR LE FORMULAIRE SI PAS LES DONNEES
	{
		header("location:AAAAAindex.php");

	}
?>