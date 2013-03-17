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

$classLoader = new \Doctrine\Common\ClassLoader('Slim\Extras\Middleware');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Symfony','Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Classes');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Classes\OAuth');
$classLoader->register();

// Register OAuth2 Namespaces through Doctrine Auto Loader
$classLoader = new \Doctrine\Common\ClassLoader('OAuth2\Storage', 'Routes\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('OAuth2\Util', 'Routes\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('OAuth2', 'Routes\\Oauth2\\vendor\\lncd\\Oauth2\\src\\');
$classLoader->register();


// configuration (2)
$config = new \Doctrine\ORM\Configuration();

// Proxies (3)
$config->setProxyDir(__DIR__ . '/Proxies');
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
