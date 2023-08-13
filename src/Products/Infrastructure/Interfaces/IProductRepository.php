<?php

namespace Products\Infrastructure\Interfaces;

interface IProductRepository {
  public function getAll();
  public function getById($id);
}
