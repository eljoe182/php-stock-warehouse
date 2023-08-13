<?php

namespace Warehouse\Domain\Class;

use Warehouse\Domain\Interfaces\IWarehouse;

class Warehouse implements IWarehouse
{
  public $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function toPrimitive()
  {
    return (object) array_map(function ($value) {
      return $value;
    }, (array) $this->data);
  }
}
