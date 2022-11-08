<?php

namespace SultanovPackage\MyCase\Services\Importers;

use SultanovPackage\MyCase\Models\Users;
use SultanovPackage\MyCase\Services\Interfaces\ImporterInterface;

class SqliteImporter implements ImporterInterface
{
    public function getData(array $query = []): array
    {
        $data = [];

        $data['data'] = Users::select([
            'first_name',
            'last_name',
            'birthday',
            'phone',
            'country'
        ])->get()->toArray();

        $headersRaw = [
            'first_name',
            'last_name',
            'birthday',
            'phone',
            'country'
        ];

        return [
            'headers' => predefineHeaders($headersRaw),
            'data' => $data['data'],
            'totalRecordCount' => count($data['data']),
        ];
    }
}
