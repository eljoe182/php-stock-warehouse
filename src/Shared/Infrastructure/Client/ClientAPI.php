<?php

namespace Shared\Infrastructure\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Shared\Infrastructure\Interfaces\IMethods;

class ClientAPI implements IMethods
{
  private $client;
  private $segment = '/api';

  public function __construct()
  {
    $this->client = new GuzzleClient([
      'base_uri' => $_ENV['HOST_API'],
      'defaults' => [
        'headers' => [
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
          'Content-Length' => -1
        ],
      ]
    ]);
  }

  private function setUrl($url): string
  {
    return $this->segment . $url;
  }

  /**
   * @throws GuzzleException
   */
  public function get($url, $params = [], $headers = [])
  {
    $response = $this->client->request('GET', $this->setUrl($url), [
      'headers' => $headers,
      'query' => $params,
    ]);
    return json_decode($response->getBody()->getContents());
  }

  /**
   * @throws GuzzleException
   */
  public function post($url, $data, $headers = [])
  {
    $response = $this->client->request('POST', $this->setUrl($url), [
      'headers' => array_merge(
        [ 'Content-Type' => 'application/json' ],
        $headers
      ),
      'json' => $data,
    ]);

    return json_decode($response->getBody()->getContents());
  }

  public function put($url, $data, $params = [], $headers = [])
  {
    $response = $this->client->request('PUT', $this->setUrl($url), [
      'headers' => array_merge(
        [ 'Content-Type' => 'application/json' ],
        $headers
      ),
      'query' => $params,
      'json' => $data,
    ]);

    return json_decode($response->getBody()->getContents());
  }

  public function delete($url, $params = [], $headers = [])
  {
    // TODO: Implement delete() method.
  }
}