<?php

namespace Warehouse\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Warehouse\Infrastructure\Repository\WarehouseRepository;
use Warehouse\Domain\Warehouse;

class GetStockWarehouse implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new WarehouseRepository($token);
  }

  public function execute($id)
  {
    $result = $this->repository->getStockWarehouse($id);

    $stockWarehouse = new Warehouse($result);

    return $stockWarehouse->data;
  }
}