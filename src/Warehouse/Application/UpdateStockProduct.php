<?php

namespace Warehouse\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Warehouse\Infrastructure\Repository\WarehouseRepository;
use Warehouse\Domain\Class\Warehouse;

class UpdateStockProduct implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new WarehouseRepository($token);
  }

  public function execute($params)
  {
    $result = $this->repository->updateStockProduct($params->productId, $params->warehouseId, $params->quantity);

    $stockProduct = new Warehouse($result);

    return $stockProduct->data;
  }
}