<?php

namespace ClientType\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use ClientType\Infrastructure\Repository\ClientTypesRepository;
use ClientType\Domain\Class\ClientTypes;

class GetClientTypes implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ClientTypesRepository($token);
  }

  public function execute($params = null)
  {
    $result = $this->repository->getClientTypes();

    $clientTypes = new ClientTypes($result);

    return $clientTypes->data;
  }
}
