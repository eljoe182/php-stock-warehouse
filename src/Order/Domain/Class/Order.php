<?php

namespace Order\Domain\Class;

use Order\Domain\Interfaces\IOrder;

class Order implements IOrder
{
  public $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function formatToStore()
  {
    return $this->$data;
  }
}
