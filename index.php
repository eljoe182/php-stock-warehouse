<?php

require 'app/index.php';

use Warehouse\Application\Authentication;
use Warehouse\Application\GetStockWarehouse;

try {
  $auth = new Authentication();
  $token = $auth->geToken()->value;

  $stock = new GetStockWarehouse();
  $stock->token = "Bearer $token";
  $result = $stock->getStockWarehouse('CCS');

  var_dump($result);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}