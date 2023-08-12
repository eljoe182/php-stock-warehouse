<?php

namespace Shared\Infrastructure\Implementation;

use Shared\Infrastructure\Client\ClientAPI;

class BaseUseCase {
  protected $client;
  public $token;

  public function __construct() {
    $this->client = new ClientAPI();
  }
}
