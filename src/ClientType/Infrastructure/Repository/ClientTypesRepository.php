<?php

namespace ClientType\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Implementation\APIRepository;
use ClientType\Infrastructure\Interfaces\IClientTypesRepository;

class ClientTypesRepository extends APIRepository implements IClientTypesRepository
{
  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function getClientTypes() {
    $url = "/sales/tables/clientType";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
