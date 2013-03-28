<?php
require_once 'Doctrine/Common/ClassLoader.php';

// Autoloader setup: Register common namespaces (Route specific namespaces registered in specific route files)
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Slim');
$classLoader->register();

//$classLoader = new \Doctrine\Common\ClassLoader('Slim\Extras\Middleware');
//$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Symfony','Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Classes');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Classes\OAuth');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('MG');
$classLoader->register();

// Register OAuth2 Namespaces through Doctrine Auto Loader
$classLoader = new \Doctrine\Common\ClassLoader('OAuth2\Storage', 'MG\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('OAuth2\Util', 'MG\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('OAuth2', 'MG\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();