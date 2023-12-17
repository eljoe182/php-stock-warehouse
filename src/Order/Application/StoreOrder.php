<?php

namespace Order\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Order\Infrastructure\Repository\OrderRepository;
use Order\Domain\Order;

class StoreOrder implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new OrderRepository($token);
  }

  public function execute($data)
  {
    $order = new Order($data);

    $result = $this->repository->store($order->formatTo2k8());

    return $result;
  }
}
