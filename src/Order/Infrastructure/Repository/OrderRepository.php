<?php

namespace Order\Infrastructure\Repository;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Implementation\APIRepository;
use Order\Infrastructure\Interfaces\IOrderRepository;

class OrderRepository extends APIRepository implements IOrderRepository
{
  public function __construct($token) {
    parent::__construct();
    $this->token = "Bearer $token";
  }

  /**
   * @throws GuzzleException
   */
  public function store($order)
  {
    $url = "/sales/orders";
    $headers = [
      'Authorization' => $this->token,
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
    ];

    return $this->client->post($url, $order, $headers);
  }
}
