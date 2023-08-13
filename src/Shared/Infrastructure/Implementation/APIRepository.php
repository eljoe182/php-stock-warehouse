<?php

namespace Shared\Infrastructure\Implementation;

use Shared\Infrastructure\Client\ClientAPI;

class APIRepository {
  protected $client;
  public $token;

  public function __construct() {
    $this->client = new ClientAPI();
  }
}
