<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Transport\Application\GetAllTransports;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show all transports
  $transports = new GetAllTransports($token);
  $result = $transports->execute();

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}