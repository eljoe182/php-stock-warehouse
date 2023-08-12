<?php

namespace ClientType\Application;

use GuzzleHttp\Exception\GuzzleException;
use ClientType\Domain\Interfaces\IClientTypes;
use Shared\Infrastructure\Implementation\BaseUseCase;

class GetClientTypes extends BaseUseCase implements IClientTypes
{
  /**
   * @throws GuzzleException
   */
  public function getClientTypes()
  {
    $url = "/sales/tables/clientType";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
