<?php

namespace Warehouse\Application;

use GuzzleHttp\Exception\GuzzleException;
use Warehouse\Domain\Interfaces\IStockWarehouse;
use Shared\Infrastructure\Implementation\BaseUseCase;

class GetStockWarehouse extends BaseUseCase implements IStockWarehouse
{
  /**
   * @throws GuzzleException
   */
  public function getStockWarehouse($id)
  {
    $url = "/inventory/StockWarehouse/show/byWarehouseId/$id";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}