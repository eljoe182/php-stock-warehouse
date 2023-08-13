<?php

namespace Order\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Order\Infrastructure\Repository\OrderRepository;
use Order\Domain\Class\Order;

class StoreOrder implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new OrderRepository($token);
  }

  public function execute($data)
  {
    $result = $this->repository->store($data);

    return $result;
  }
}
