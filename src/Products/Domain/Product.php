<?php

namespace Products\Domain;

use Products\Domain\Interfaces\IProduct;

class Product implements IProduct
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
