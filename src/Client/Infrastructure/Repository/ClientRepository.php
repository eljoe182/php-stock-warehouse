<?php

namespace Client\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Implementation\APIRepository;
use Client\Infrastructure\Interfaces\IClientRepository;

class ClientRepository extends APIRepository implements IClientRepository
{
  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function getAll()
  {
    $url = "/sales/tables/client";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }

  public function getById($id)
  {
    $url = "/sales/tables/client/show/$id";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }

  public function getByRif($rif)
  {
    $url = "/sales/tables/client/show/byRif/$rif";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}