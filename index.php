<?php

require_once 'app/index.php';

use Shared\Application\Authentication;
use Warehouse\Application\GetStockWarehouse;
use Warehouse\Application\GetStockProduct;
use Warehouse\Application\UpdateStockProduct;

use ClientType\Application\GetClientTypes;
use Client\Application\GetAllClients;
use Client\Application\FindClientById;
use Client\Application\FindClientByRif;

use Transport\Application\GetAllTransports;

try {
  $auth = new Authentication();
  $token = $auth->geToken()->value;

  // Show all warehouses
  // $stock = new GetStockWarehouse();
  // $stock->token = "Bearer $token";
  // $result = $stock->getStockWarehouse('001');
  
  // Show product an a warehouse
  // $stockProduct = new GetStockProduct();
  // $stockProduct->token = "Bearer $token";
  // $result = $stockProduct->getStockProduct('3003023', 'CCS');

  // Update product an a warehouse
  // $updateStockProduct = new UpdateStockProduct();
  // $updateStockProduct->token = "Bearer $token";
  // $result = $updateStockProduct->updateStockProduct('3003023', 'CCS', 45);

  // Show all client types
  $clientTypes = new GetClientTypes();
  $clientTypes->token = "Bearer $token";
  $result = $clientTypes->getClientTypes();

  // Show all clients
  // $clients = new GetAllClients();
  // $clients->token = "Bearer $token";
  // $result = $clients->getAllClients();

  // Show client by id
  // $findClient = new FindClientById();
  // $findClient->token = "Bearer $token";
  // $result = $findClient->findById('411613770');

  // Show client by rif
  // $findClient = new FindClientByRif();
  // $findClient->token = "Bearer $token";
  // $result = $findClient->findByRif('J-41161377-0');

  // Show all transports
  // $transports = new GetAllTransports();
  // $transports->token = "Bearer $token";
  // $result = $transports->getAllTransports();

  die(var_dump($result));
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}