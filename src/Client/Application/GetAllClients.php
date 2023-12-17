<?php

namespace Client\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Client\Infrastructure\Repository\ClientRepository;
use Client\Domain\Client;

class GetAllClients implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ClientRepository($token);
  }

  public function execute($params = null)
  {
    $result = $this->repository->getAll();

    $clients = new Client($result);

    return $clients->data;
  }
}
