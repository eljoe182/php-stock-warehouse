<?php

namespace Transport\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Transport\Infrastructure\Repository\TransportRepository;
use Transport\Domain\Class\Transport;

class GetAllTransports implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new TransportRepository($token);
  }

  public function execute($params = null)
  {
    $result = $this->repository->getAll();

    $transports = new Transport($result);

    return $transports->data;
  }
}
