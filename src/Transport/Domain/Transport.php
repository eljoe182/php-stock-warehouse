<?php

namespace Transport\Domain;

use Transport\Domain\Interfaces\ITransport;

class Transport implements ITransport
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
