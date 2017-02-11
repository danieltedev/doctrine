<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

use app\Categoria;

$c = new Categoria();

$c->setNome('Categoria ' . rand(10, 100));

$entityManager->persist($c);

$entityManager->flush();

$jsonContent = $serializer->serialize($c, 'json');
echo "<pre>";
echo json_encode(json_decode($jsonContent), JSON_PRETTY_PRINT);
echo "</pre>";