<?php

namespace Warehouse\Domain\Interfaces;

interface IStockUpdateProduct
{
    public function updateStockProduct($productId, $warehouseId, $quantity);
}