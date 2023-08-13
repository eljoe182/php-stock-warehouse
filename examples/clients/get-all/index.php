<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Client\Application\GetAllClients;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show all clients
  $clients = new GetAllClients($token);
  $result = $clients->execute();

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}
