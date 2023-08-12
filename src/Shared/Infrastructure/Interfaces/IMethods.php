<?php

namespace Shared\Infrastructure\Interfaces;

interface IMethods
{
    public function get($url, $params = [], $headers = []);
    public function post($url, $data, $headers = []);
    public function put($url, $data, $params = [], $headers = []);
    public function delete($url, $params = [], $headers = []);
}