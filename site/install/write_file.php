<?php
	if(   isset( $_POST["dbhost"] )
	   && isset( $_POST["dbname"] )
	   && isset( $_POST["dbuser"] )
	   && isset( $_POST["dbpass"] )
	)
	{	// Y A TOUT ON Y VA !!!

		$dbhost = $_POST["dbhost"];
		$dbname = $_POST["dbname"];
		$dbuser = $_POST["dbuser"];
		$dbpass = $_POST["dbpass"];

		require_once('template_config_file.php');

		$config_file = fopen('../include/config.php', 'a+');

		ftruncate($config_file, 0);

		fwrite( $config_file, $template );

		fclose($config_file);

		header("location:../index.php/clean_install");
	}
	else //REDIRIGE SUR LE FORMULAIRE SI PAS LES DONNEES
		header("location:index.php");
?>