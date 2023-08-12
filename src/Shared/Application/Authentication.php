<?php


namespace Shared\Application;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Domain\IAuthentication;
use Shared\Infrastructure\Implementation\BaseUseCase;

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

    return $this->client->post($url, $data, []);
  }
}