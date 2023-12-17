<?php

namespace Products\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Products\Infrastructure\Repository\ProductRepository;
use Products\Domain\Product;

class GetAllProducts implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ProductRepository($token);
  }

  public function execute($params = null)
  {
    $result = $this->repository->getAll();

    $products = new Product($result);

    return $products->data;
  }
}
