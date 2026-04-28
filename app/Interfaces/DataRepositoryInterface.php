<?php

namespace App\Interfaces;

interface DataRepositoryInterface
{
    public function getAll();

    public function getById($orderId);

    public function getBySearch($parameter);
}
