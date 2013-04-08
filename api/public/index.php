<?php
Namespace MardiGras;

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();

    require '../config/include.php';

    // Slim and oauth obj
    $app = new Lib\Slim();
    $oauth = new Lib\OauthServer($app, $em);

    // Include all route scripts
    require RESOURCES_PATH . '/lib/MardiGras/routes/include.php';




    // Run SLIM
    $app->run();
?>