<?php

function predefineHeaders(array $headersRaw): array
{
    $transHeaders = trans('case::headers');

    $headers = [];

    foreach ($headersRaw as $header){
        $hTitle = $header;

        if (isset($transHeaders[$header]))
            $hTitle = $transHeaders[$header];

        $headers[] = [
            "label" => $hTitle,
            "field" => $header,
            "sortable" => false,
            "isKey" => false
        ];
    }

    return $headers;
}
