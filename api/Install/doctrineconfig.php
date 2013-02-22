This file should be used in the root folder of the api to generate the entity classes.
Documentation and src of this script located at <a href="http://jejakroda.wordpress.com/2011/02/03/generate-doctrine2-mappings-from-existing-database/">http://jejakroda.wordpress.com/2011/02/03/generate-doctrine2-mappings-from-existing-database/</a>

The documentation mentioned above was used due to the official doc being under construction. The official documentation can be found here: <a href="http://docs.doctrine-project.org/en/latest/tutorials/getting-started-database.html">http://docs.doctrine-project.org/en/latest/tutorials/getting-started-database.html</a>

<?PHP
# before using, backup and remove old entity classes, then remove the exit() below.
exit();
use Doctrine\ORM\Tools\EntityGenerator;

ini_set("display_errors", "On");

// this is not necessary if you use Doctrine2 with PEAR
//$libPath = __DIR__ . '/../lib/doctrine2';

// autoloaders
require_once 'Doctrine/Common/ClassLoader.php';

//$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', $libPath);	// custom path
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');	// with PEAR
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(__DIR__ . '/Entities'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');

$connectionParams = array(
  'dbname' => '',
  'user' => 'root',
  'password' => '',
  'host' => 'localhost',
  'driver' => 'pdo_mysql',
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
  $em->getConnection()->getSchemaManager()
);

$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);	// we must set the EntityManager

$classes = $driver->getAllClassNames();
$metadata = array();
foreach ($classes as $class) {
  //any unsupported table/schema could be handled here to exclude some classes
  if (true) {
    $metadata[] = $cmf->getMetadataFor($class);
  }
}

$generator = new EntityGenerator();
$generator->setAnnotationPrefix('');   // edit: quick fix for No Metadata Classes to process
$generator->setUpdateEntityIfExists(true);	// only update if class already exists
//$generator->setRegenerateEntityIfExists(true);	// this will overwrite the existing classes
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, __DIR__ . '/Entities');

print 'Done!';
?>