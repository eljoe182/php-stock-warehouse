<?php

namespace Client\Infrastructure\Interfaces;

interface IClientRepository
{
  public function getAll();
  public function getById($id);
  public function getByRif($rif);
}