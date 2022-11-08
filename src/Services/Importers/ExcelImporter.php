<?php

namespace SultanovPackage\MyCase\Services\Importers;

use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SultanovPackage\MyCase\Services\Interfaces\ImporterInterface;

class ExcelImporter implements ImporterInterface
{
    private string $spreadSheetFile = MICRO_SRC_DIR . '/Dev/fake-data.xlsx';

    private Worksheet $spreadsheet;

    private function setSpreadSheet(Worksheet $spreadsheet)
    {
        $this->spreadsheet = $spreadsheet;
    }

    private function setDefaults()
    {
        $this->setSpreadSheet( (IOFactory::load($this->spreadSheetFile))->getActiveSheet() );
    }

    private function getSpreadSheet(): Worksheet
    {
        return $this->spreadsheet;
    }

    private function queryUpdateSheet($query)
    {
        //
        //Бизнес логика фильтрации данных
        //

        $spreadSheet = $this->getSpreadSheet();

        foreach ($spreadSheet->getRowIterator() as $row)
        {
            // Предполагается что первые строки таблицы будут заголовками
            if ($row->getRowIndex() === 1)
                continue;

            // Конкретно в моём импортере меняем формат даты
            $bd = $spreadSheet->getCell('C' . $row->getRowIndex())->getValue();
            $spreadSheet->setCellValue('C' . $row->getRowIndex(), Carbon::createFromFormat('Y-m-d', $bd)->format('d.m.Y'));
        }

        $this->setSpreadSheet($spreadSheet);
    }

    #[ArrayShape([
        'headers' => "array",
        'data' => "array",
        'totalRecordCount' => "int|void"
    ])]
    public function getData(array $query = []): array
    {
        $this->setDefaults();
        $this->queryUpdateSheet($query);

        $data = [];

        $data['data'] = $this->spreadsheet->toArray();
        $headersRaw = collect($data['data'])->first();
        unset($data['data'][0]);

        $headers = predefineHeaders($headersRaw);

        $exportData = [];
        foreach ($data['data'] as $datum)
        {
            $sElement = [];
            foreach ($datum as $idx => $val)
                $sElement[$headers[$idx]['field']] = $val;
            $exportData[] = $sElement;
        }

        return [
            'headers' => $headers,
            'data' => $exportData,
            'totalRecordCount' => count($exportData),
        ];
    }
}
