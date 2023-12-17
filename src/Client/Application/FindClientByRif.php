<?php

namespace Client\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Client\Infrastructure\Repository\ClientRepository;
use Client\Domain\Client;

class FindClientByRif implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ClientRepository($token);
  }

  public function execute($rif)
  {
    $result = $this->repository->getByRif($rif);

    $client = new Client($result);

    return $client->data;
  }
}
