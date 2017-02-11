<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

use app\Produto;

$c = $entityManager->find('app\Categoria', 1);

$p = new Produto();

$p->setNome('Produto ' . rand(10, 100));

$p->setCategoria($c);

$entityManager->persist($p);
$entityManager->flush();

$jsonContent = $serializer->serialize($p, 'json');
echo "<pre>";
echo json_encode(json_decode($jsonContent), JSON_PRETTY_PRINT);
echo "</pre>";