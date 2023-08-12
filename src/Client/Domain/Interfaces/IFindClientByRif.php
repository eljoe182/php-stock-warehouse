<?php

namespace Client\Domain\Interfaces;

interface IFindClientByRif
{
  public function findByRif($rif);
}
