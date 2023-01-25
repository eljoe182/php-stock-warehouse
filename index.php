<?php

require 'app/index.php';

use Warehouse\Application\Authentication;
use Warehouse\Application\GetStockWarehouse;
use Warehouse\Application\GetStockProduct;
use Warehouse\Application\UpdateStockProduct;

try {
  $auth = new Authentication();
  $token = $auth->geToken()->value;

  // Show all warehouses
  $stock = new GetStockWarehouse();
  $stock->token = "Bearer $token";
  $result = $stock->getStockWarehouse('CCS');
  
  // Show product an a warehouse
  // $updateStockProduct = new UpdateStockProduct();
  // $updateStockProduct->token = "Bearer $token";
  // $result = $updateStockProduct->updateStockProduct('3003023', 'CCS', 45);

  // Update product an a warehouse
  // $stockProduct = new GetStockProduct();
  // $stockProduct->token = "Bearer $token";
  // $result = $stockProduct->getStockProduct('3003023', 'CCS');

  die(var_dump($result));
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}