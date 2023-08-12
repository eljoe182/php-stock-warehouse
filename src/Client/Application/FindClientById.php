<?php

namespace Client\Application;

use GuzzleHttp\Exception\GuzzleException;
use Client\Domain\Interfaces\IFindClientById;
use Shared\Infrastructure\Implementation\BaseUseCase;

class FindClientById extends BaseUseCase implements IFindClientById
{
  /**
   * @throws GuzzleException
   */
  public function findById($id)
  {
    $url = "/sales/tables/client/show/$id";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}