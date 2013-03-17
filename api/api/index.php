<?php

/* API Initialization */

    // Debug (Turn off in production)
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Session needed for Oauth2 etc
    session_start();

    // API Config constants
    require __DIR__ . '/config/apiconfig.php';

    // Init Frameworks (Doctrine ORM)
    require __DIR__ . '/config/init.php';

    // Slim
    $app = new \Slim\Slim();

    // OAuth2 Auth and Resource Servers
    $oauth = new \Classes\OauthServer($app);

/* REST Routes */

    // Examples and tests
    if (APPLICATION_ENV == "development")
        include __DIR__ . '/Routes/Examples/examples.php';

    // Authentication methods
    include __DIR__ . '/Routes/Oauth2/oauth.php';

    // POS
    include __DIR__ . '/Routes/Administration/administration.php';
    include __DIR__ . '/Routes/Customers/customers.php';
    include __DIR__ . '/Routes/Inventory/inventory.php';
    include __DIR__ . '/Routes/Invoices/invoices.php';
    include __DIR__ . '/Routes/Orders/orders.php';
    include __DIR__ . '/Routes/Reports/reports.php';
    include __DIR__ . '/Routes/Vendors/vendors.php';


    // Run SLIM
    $app->run();

?>