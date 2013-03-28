<?php

// configuration (2)
$config = new \Doctrine\ORM\Configuration();

// Proxies (3)
$config->setProxyDir(__DIR__ . '\\..\\Proxies');
$config->setProxyNamespace('Proxies');

$config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));

// Driver (4)
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__."\\..\\Entities"));
$config->setMetadataDriverImpl($driverImpl);

// Caching Configuration (5)
if (APPLICATION_ENV == "development") {

    $cache = new \Doctrine\Common\Cache\ArrayCache();

} else {

    $cache = new \Doctrine\Common\Cache\ApcCache();
}

$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

 $connectionOptions = array(
    'driver' => DBDRIVER,
    'dbname' => DBNAME,
    'user' => DBUSER,
    'password' => DBPASSWORD,
    'host' => DBHOST);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
     'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
     'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
 ));

// \Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);
// exit;
