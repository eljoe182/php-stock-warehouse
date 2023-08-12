<?php

namespace Client\Application;

use GuzzleHttp\Exception\GuzzleException;
use Client\Domain\Interfaces\IFindClientByRif;
use Shared\Infrastructure\Implementation\BaseUseCase;

class FindClientByRif extends BaseUseCase implements IFindClientByRif
{
  /**
   * @throws GuzzleException
   */
  public function findByRif($rif)
  {
    $url = "/sales/tables/client/show/byRif/$rif";
    $headers = [
      'Authorization' => $this->token
    ];

    return $this->client->get($url, [], $headers);
  }
}
