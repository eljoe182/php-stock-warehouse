<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Products\Application\GetAllProducts;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show all products
  $useCase = new GetAllProducts($token);
  $result = $useCase->execute();

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}