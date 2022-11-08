<?php

namespace SultanovPackage\MyCase\Controllers;

use SultanovPackage\MyCase\Services\DataImport;
use SultanovSolutions\LaravelBase\Controllers\BaseController;

class ApiDataImport extends BaseController
{
    public function getExcel(): array
    {
        return ( new DataImport('excel') )->getImportData();
    }

    public function getSQLite(): array
    {
        return ( new DataImport('sqlite') )->getImportData();
    }

    public function getJSON(): array
    {
        return ( new DataImport('json') )->getImportData();
    }
}
