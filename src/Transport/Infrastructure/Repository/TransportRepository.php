<?php

namespace Transport\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Implementation\APIRepository;
use Transport\Infrastructure\Interfaces\ITransportRepository;

class TransportRepository extends APIRepository implements ITransportRepository {

  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function getTransports() {
    $url = "/tables/transport";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}