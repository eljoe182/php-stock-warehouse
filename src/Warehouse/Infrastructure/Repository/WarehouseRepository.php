<?php

namespace Warehouse\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Implementation\APIRepository;
use Warehouse\Infrastructure\Interfaces\IWarehouseRepository;

class WarehouseRepository extends APIRepository implements IWarehouseRepository
{
  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function getStockWarehouse($warehouseId) {
    $url = "/inventory/StockWarehouse/show/byWarehouseId/$warehouseId";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }

  /**
   * @throws GuzzleException
   */
  public function getStockProduct($productId, $warehouseId) {
    $url = "/inventory/StockWarehouse/show/$warehouseId/$productId";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }

  /**
   * @throws GuzzleException
   */
  public function updateStockProduct($productId, $warehouseId, $quantity) {
    $url = "/inventory/StockWarehouse/update/$warehouseId/$productId";
    $headers = [
      'Authorization' => $this->token
    ];
    $body = [
      'stockAct' => $quantity
    ];

    return $this->client->put($url, $body, [], $headers);
  }
}
