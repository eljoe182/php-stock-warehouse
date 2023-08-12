<?php

namespace Client\Application;

use GuzzleHttp\Exception\GuzzleException;
use Client\Domain\Interfaces\IGetAllClient;
use Shared\Infrastructure\Implementation\BaseUseCase;

class GetAllClients extends BaseUseCase implements IGetAllClient
{
  /**
   * @throws GuzzleException
   */
  public function getAllClients()
  {
    $url = "/sales/tables/client";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
