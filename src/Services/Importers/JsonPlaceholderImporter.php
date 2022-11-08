<?php

namespace SultanovPackage\MyCase\Services\Importers;

use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\ArrayShape;
use SultanovPackage\MyCase\Services\Interfaces\ImporterInterface;

class JsonPlaceholderImporter implements ImporterInterface
{
    #[ArrayShape([
        'headers' => "array",
        'data' => "array|mixed",
        'totalRecordCount' => "int|void"
    ])]
    public function getData(array $query = []): array
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->status() !== 200)
            abort($response->status());

        $data = $response->json();

        $headersRaw = collect(collect($data)->first())->keys()->toArray();


        return [
            'headers' => predefineHeaders($headersRaw),
            'data' => $data,
            'totalRecordCount' => count($data),
        ];
    }
}
