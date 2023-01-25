<?php

namespace Warehouse\Domain\Interfaces;

interface IStockProduct
{
    public function getStockProduct($productId, $warehouseId);
}