<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Order\Application\StoreOrder;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  $dateCommitment = new DateTime();
  $dateFormat = $dateCommitment->format("Y-m-d");

  /// TODO: create array of items
  $row = new stdClass();
  $row->rowNumber = 1; // must be defined
  $row->productId = '0806'; // must be defined
  $row->warehouseId = '001'; // must be defined
  $row->quantity = 2;
  $row->measurementUnit = 'DIS'; // must be defined
  $row->price = 200;
  $row->taxId = '1'; // must be defined
  $row->dateCommitment = $dateFormat;

  $items = [];
  $items[] = $row;

  /// TODO: set header info
  $data = new stdClass();

  $data->clientId = '000150788'; // must be defined
  $data->deliveryTypeId = '001'; // must be defined
  $data->sellerId = '006'; // must be defined
  $data->paymentId = '001'; // must be defined
  $data->branchOfficeId = '001'; // must be defined
  $data->description = ' ';
  $data->dateCommitment = $dateFormat;
  $data->comment = 'TEST';
  $data->currencyId = 'BSD'; // must be defined
  $data->totalAmount = 400;
  $data->totalNet = 464;
  $data->tax = 64;
  $data->items = $items;

  // Show product an a warehouse
  $useCase = new StoreOrder($token);
  $result = $useCase->execute($data);

  echo var_dump($result);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}