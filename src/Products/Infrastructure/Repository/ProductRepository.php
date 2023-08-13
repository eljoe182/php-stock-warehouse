<?php

namespace Products\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Products\Infrastructure\Interfaces\IProductRepository;
use Shared\Infrastructure\Implementation\APIRepository;

class ProductRepository extends APIRepository implements IProductRepository
{
  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function getAll() {
    $url = "/inventory/product";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }

  /**
   * @throws GuzzleException
   */
  public function getById($id) {
    $url = "/inventory/product/show/$id";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
