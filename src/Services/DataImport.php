<?php

namespace SultanovPackage\MyCase\Services;

use SultanovPackage\MyCase\Services\Importers\{ExcelImporter, SqliteImporter, JsonPlaceholderImporter};
use SultanovPackage\MyCase\Services\Interfaces\ImporterInterface;


class DataImport
{
    private ImporterInterface $importer;

    private array $importData = [];

    protected array $importers = [
        'excel' => ExcelImporter::class,
        'sqlite' => SqliteImporter::class,
        'json' => JsonPlaceholderImporter::class,
    ];

    public function __construct(string $type, array $query = [])
    {
        if (!isset($this->importers[$type]))
            abort(500, 'Importer not found');

        $this->importer = app($this->importers[$type]);

        $this->setImportData($this->importer->getData($query));
    }

    /**
     * @param array $importData
     */
    public function setImportData(array $importData): void
    {
        $this->importData = $importData;
    }

    /**
     * @return array
     */
    public function getImportData(): array
    {
        return $this->importData;
    }
}
