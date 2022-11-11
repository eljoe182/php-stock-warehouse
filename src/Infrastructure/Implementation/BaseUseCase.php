<?php

namespace Warehouse\Infrastructure\Implementation;

use Warehouse\Infrastructure\Client\ClientAPI;

class BaseUseCase {
  protected ClientAPI $client;
  public string $token;

  public function __construct() {
    $this->client = new ClientAPI();
  }
}
