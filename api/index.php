<?php
// Debug
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

// Initialize Slim and Doctrine
require_once(__DIR__ . '/config/init.php');

$dql = "SELECT a FROM Entities\Clerks a";
try {
    $query = $em->createQuery($dql);
    $query->setMaxResults(30);
    $bugs_qr = $query->getResult();
    print_r($bugs_qr);
} catch (Exception $e) {
    echo $e->getMessage() . '< br />';
}
?>