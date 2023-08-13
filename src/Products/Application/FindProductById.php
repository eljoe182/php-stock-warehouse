<?php

namespace Products\Application;

use Shared\Infrastructure\Interfaces\IBaseUseCase;
use Products\Infrastructure\Repository\ProductRepository;
use Products\Domain\Class\Product;

class FindProductById implements IBaseUseCase
{
  private $repository;

  public function __construct($token)
  {
    $this->repository = new ProductRepository($token);
  }

  public function execute($id)
  {
    $result = $this->repository->getById($id);

    $products = new Product($result);

    return $products->data;
  }
}
