<?php

namespace ClientType\Domain\Class;

use ClientType\Domain\Interfaces\IClientTypes;

class ClientTypes implements IClientTypes
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
