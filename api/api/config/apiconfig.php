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

	// OAuth2 DB
	define('OAUTH2DBNAME','mg_oauth');
	define('OAUTH2DBUSER','root');
	define('OAUTH2DBPASSWORD','devpass');
	define('OAUTH2DBHOST','localhost');

	// REST
	define('HOSTURL', 'http://localhost:81/');
	define('RESTBASE','api/api/');