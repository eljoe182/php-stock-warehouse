<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Warehouse\Application\GetStockProduct;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  // Show product an a warehouse
  $stockProduct = new GetStockProduct($token);
  $params = new stdClass();
  $params->productId = '1796';
  $params->warehouseId = '001';
  $result = $stockProduct->execute($params);

  echo json_encode($result, JSON_PRETTY_PRINT);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}