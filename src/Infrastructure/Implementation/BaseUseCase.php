<?php

namespace Warehouse\Infrastructure\Implementation;

use Warehouse\Infrastructure\Client\ClientAPI;

class BaseUseCase {
  protected $client;
  public $token;

  public function __construct() {
    $this->client = new ClientAPI();
  }
}
