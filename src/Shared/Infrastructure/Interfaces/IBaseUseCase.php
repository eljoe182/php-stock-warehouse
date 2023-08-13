<?php

namespace Shared\Infrastructure\Interfaces;

interface IBaseUseCase {
  public function execute($params);
}
