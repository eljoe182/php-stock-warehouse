<?php

namespace Client\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Client\Infrastructure\Repository\ClientRepository;
use Client\Domain\Client;

class FindClientById implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ClientRepository($token);
  }

  public function execute($id)
  {
    $result = $this->repository->getById($id);

    $client = new Client($result);

    return $client->data;
  }
}