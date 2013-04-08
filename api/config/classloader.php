<?php
require_once RESOURCES_PATH . '/lib/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', RESOURCES_PATH . '/lib/');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities', RESOURCES_PATH . '/lib/Mardigras/Lib/');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', RESOURCES_PATH . '/lib/Mardigras/Lib/');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Slim', RESOURCES_PATH . '/lib/');
$classLoader->register();

//$classLoader = new \Doctrine\Common\ClassLoader('Slim\Extras\Middleware');
//$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Symfony', RESOURCES_PATH . '/lib/Doctrine/');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('MardiGras', RESOURCES_PATH . '/lib/');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('OAuth2', RESOURCES_PATH . '/lib/');
$classLoader->register();