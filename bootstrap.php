<?php

    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

    require_once "vendor/autoload.php";

    $isDevMode = true;
    $proxyDir = null;
    $cache = null;
    $useSimpleAnnotationReader = false;
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/entities"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

    $conn = array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'personnel_projects'
    );

    $entityManager = EntityManager::create($conn, $config);
