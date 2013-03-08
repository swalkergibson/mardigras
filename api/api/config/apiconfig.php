<?php
/* General API settings */

	// Environment Status
	define('APPLICATION_ENV', "development"); //Valid entries: "development" "production"

	// Database
	define('DBDRIVER','pdo_mysql');
	define('DBNAME','mgdb_dev');
	define('DBUSER','root');
	define('DBPASSWORD','devpass');
	define('DBHOST','localhost');

	// REST
	define('RESTBASE','api/api/');