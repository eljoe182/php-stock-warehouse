<?php


namespace Warehouse\Application;

use GuzzleHttp\Exception\GuzzleException;
use Warehouse\Domain\Interfaces\IAuthentication;
use Warehouse\Infrastructure\Implementation\BaseUseCase;

class Authentication extends BaseUseCase implements IAuthentication
{
  /**
   * @throws GuzzleException
   */
  public function geToken()
  {
    $url = '/token';

    $data = [
      'username' => $_ENV['USERNAME'],
      'password' => $_ENV['PASSWORD'],
      'database' => $_ENV['DATABASE']
    ];

    return $this->client->post($url, $data);
  }
}