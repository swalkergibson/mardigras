<?php

/* API Initialization */

    // Debug (Turn off in production)
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Session needed for Oauth2 etc
    session_start();

    // API Config constants
    require __DIR__ . '/config/apiconfig.php';

    // init Doctrine class loader obj's
    require __DIR__ . '/config/init_autoloader.php';

    // init Doctrine obj's
    require __DIR__ . '/config/init.php';

    // Slim
    $app = new \Slim\Slim();

    // OAuth2 Auth and Resource Servers
    $oauth = new \Classes\OauthServer($app, $em);


/* REST Routes */

    // Examples and tests
    if (APPLICATION_ENV == "development")
        include __DIR__ . '/MG/Examples_routes.php';

    // Authentication methods
    include __DIR__ . '/MG/Oauth2/oauth.php';

    // POS
    include __DIR__ . '/MG/Clerks_routes.php';
    include __DIR__ . '/MG/Customers_routes.php';
    include __DIR__ . '/MG/Inventory_routes.php';
    include __DIR__ . '/MG/Invoices_routes.php';
    include __DIR__ . '/MG/Orders_routes.php';
    include __DIR__ . '/MG/Vendors_routes.php';


    // Run SLIM
    $app->run();

?>