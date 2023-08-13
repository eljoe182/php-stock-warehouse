<?php

namespace Order\Infrastructure\Interfaces;

interface IOrderRepository
{
    public function store($order);
}
