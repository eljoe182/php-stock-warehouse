<?php

namespace Warehouse\Application;

use GuzzleHttp\Exception\GuzzleException;
use Warehouse\Domain\Interfaces\IStockUpdateProduct;
use Shared\Infrastructure\Implementation\BaseUseCase;

class UpdateStockProduct extends BaseUseCase implements IStockUpdateProduct
{
  /**
   * @throws GuzzleException
   */
  public function updateStockProduct($productId, $warehouseId, $quantity)
  {
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