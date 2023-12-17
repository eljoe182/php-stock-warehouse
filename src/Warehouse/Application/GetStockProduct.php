<?php

namespace Warehouse\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Warehouse\Infrastructure\Repository\WarehouseRepository;
use Warehouse\Domain\Warehouse;

class GetStockProduct implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new WarehouseRepository($token);
  }

  public function execute($params)
  {
    $result = $this->repository->getStockProduct($params->productId, $params->warehouseId);

    $stockProduct = new Warehouse($result);

    return $stockProduct->data;
  }
}