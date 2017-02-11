<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
//use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Cache\ArrayCache;

//$isDevMode = true;
//$entidades = array('src' . DIRECTORY_SEPARATOR);
//$config = Setup::createAnnotationMetadataConfiguration($entidades, $isDevMode);

$cache = new ArrayCache();
$config = new Configuration();
$config->setMetadataCacheImpl($cache);
$config->setEntityNamespaces(array('app' => 'src'));
$driver = $config->newDefaultAnnotationDriver('src' . DIRECTORY_SEPARATOR);
$config->setMetadataDriverImpl($driver);
$config->setQueryCacheImpl($cache);
$config->setProxyDir('/src');
$config->setProxyNamespace('app');

$config->setAutoGenerateProxyClasses(true);

$con = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'doctrinedb'
);

$entityManager = EntityManager::create($con, $config);

$tool = new SchemaTool($entityManager);

$classes = $entityManager->getMetadataFactory()->getAllMetadata();
$tool->updateSchema($classes);

$encoder = new JsonEncoder();
$normalizer = new ObjectNormalizer();
$normalizer->setIgnoredAttributes(array('__initializer__', '__cloner__', '__isInitialized__'));

$serializer = new Serializer(array($normalizer), array($encoder));
