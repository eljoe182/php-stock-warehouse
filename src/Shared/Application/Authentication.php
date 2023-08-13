<?php


namespace Shared\Application;

use GuzzleHttp\Exception\GuzzleException;
use Shared\Domain\IAuthentication;
use Shared\Infrastructure\Implementation\APIRepository;

class Authentication extends APIRepository implements IAuthentication
{
  /**
   * @throws GuzzleException
   */
  public function getToken()
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