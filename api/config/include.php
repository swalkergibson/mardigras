<?php
/* Include all config scripts */

// API config constants
require __DIR__ . '/constants.php';

// register namespaces with the class loader
require __DIR__ . '/classloader.php';

// init Doctrine objects
require __DIR__ . '/doctrine.php';