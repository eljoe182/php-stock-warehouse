<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Products\Application\FindProductById;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Find product by id
  $useCase = new FindProductById($token);
  $result = $useCase->execute("1796");

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}