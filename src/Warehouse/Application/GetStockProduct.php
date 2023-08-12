<?php

namespace Warehouse\Application;

use GuzzleHttp\Exception\GuzzleException;
use Warehouse\Domain\Interfaces\IStockProduct;
use Shared\Infrastructure\Implementation\BaseUseCase;

class GetStockProduct extends BaseUseCase implements IStockProduct
{
  /**
   * @throws GuzzleException
   */
  public function getStockProduct($productId, $warehouseId)
  {
    $url = "/inventory/StockWarehouse/show/$warehouseId/$productId";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}