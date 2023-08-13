<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use ClientType\Application\GetClientTypes;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show all client types
  $useCase = new GetClientTypes($token);
  $result = $useCase->execute();

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}