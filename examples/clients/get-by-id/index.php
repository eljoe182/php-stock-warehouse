<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Client\Application\FindClientById;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show client by id
  $findClient = new FindClientById($token);
  $result = $findClient->execute('411613770');

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}