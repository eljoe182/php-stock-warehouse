<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Warehouse\Application\UpdateStockProduct;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  $params = new stdClass();
  $params->productId = '1796';
  $params->warehouseId = '001';
  $params->quantity = 45;

  // Update product an a warehouse
  $useCase = new UpdateStockProduct($token);
  $result = $useCase->execute($params);

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}