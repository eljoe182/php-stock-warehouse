<?php

namespace Warehouse\Infrastructure\Interfaces;

interface IWarehouseRepository
{
  public function getStockWarehouse($warehouseId);
  public function getStockProduct($productId, $warehouseId);
  public function updateStockProduct($productId, $warehouseId, $quantity);
}
