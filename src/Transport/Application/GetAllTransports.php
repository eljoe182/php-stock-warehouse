<?php

namespace Transport\Application;

use GuzzleHttp\Exception\GuzzleException;
use Transport\Domain\Interfaces\IGetAllTransports;
use Shared\Infrastructure\Implementation\BaseUseCase;

class GetAllTransports extends BaseUseCase implements IGetAllTransports
{
  /**
   * @throws GuzzleException
   */
  public function getAllTransports()
  {
    $url = "/tables/transport";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
