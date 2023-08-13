<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Client\Application\FindClientByRif;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show client by rif
  $findClient = new FindClientByRif($token);
  $result = $findClient->execute('J-41161377-0');

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}