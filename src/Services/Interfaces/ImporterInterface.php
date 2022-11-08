<?php

namespace SultanovPackage\MyCase\Services\Interfaces;

interface ImporterInterface
{
    public function getData(array $query): array;
}
