<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Warehouse\Application\GetStockProduct;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // params
  $params = new stdClass();
  $params->productId = '1796';
  $params->warehouseId = '001';

  // Show product an a warehouse
  $useCase = new GetStockProduct($token);
  $result = $useCase->execute($params);

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}