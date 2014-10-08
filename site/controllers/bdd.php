<?php
		$host      = dbhost;
    	$user      = dbuser;
    	$pass      = dbpass;
    	$dbname    = dbname;

    	$reponse   = array();

		function connect()
		{
			// Set DSN
	        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    => true,
	            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
	        );
	        // Create a new PDO instanace
	        try{
	            $db = new PDO($dsn, $this->user, $this->pass, $options);
	        }
	        // Catch any errors
	        catch(PDOException $e){
	            $this->error = $e->getMessage();
	        }
	    }

		function query( $str )
		{
			connect();
	    	$temp = $db->query( $str );
	    	$this->reponse = $temp->fetchAll();
	    	$temp->closeCursor();
	    	return $reponse;
		}
		function exec( $str )
		{
			connect();
	    	return $db->exec( $str );
		}
?>