<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Warehouse\Application\GetStockWarehouse;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show all warehouses
  $useCase = new GetStockWarehouse($token);
  $result = $useCase->execute('001');

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}