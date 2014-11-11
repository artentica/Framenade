<?php

		function connect()
		{
			// Set DSN
	        $dsn = 'mysql:host=' . dbhost . ';dbname=' . dbname;
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    		=> true,
	            PDO::ATTR_ERRMODE       		=> PDO::ERRMODE_EXCEPTION, 
	            PDO::MYSQL_ATTR_INIT_COMMAND 	=> 'SET NAMES UTF8'
	        );
	        // Create a new PDO instanace
	        try
	        {
	            $GLOBALS['db'] = new PDO($dsn, dbuser, dbpass, $options);
	        }
	        // Catch any errors
	        catch(PDOException $e)
	        {
	        	$log = fopen('logs/LOGFILE.txt', 'a+');

				//sftruncate( $log, 0);

				fwrite( $log, $e->getMessage()  );

				fclose( $log);

				return false;
	        }
	        return true;
	    }

		function DBQuery( $str )
		{
			if (connect())
			{
	    		$statement 	= $GLOBALS['db']->query( $str );
	    		$reponse 	= $statement->fetchAll();
				$statement->closeCursor();
	    		return $reponse;
	    	}
	    	return false;
		}
		function DBInsert( $str )
		{
			if (connect())
			{
	    		return $GLOBALS['db']->exec( $str );
	    	}
	    	return false;
		}
?>
