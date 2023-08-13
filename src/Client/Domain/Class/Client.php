<?php

namespace Client\Domain\Class;

use Client\Domain\Interfaces\IClient;

class Client implements IClient
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
