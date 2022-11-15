<?php

namespace App;

use League\Csv\Reader;

class CompanyCollection
{
    private array $companies = [];

    private function setCollection(): void
    {
        $data = file_get_contents('https://data.gov.lv/dati/dataset/4de9697f-850b-45ec-8bba-61fa09ce932f/resource/25e80bf3-f107-4ab4-89ef-251b5b9374e9/download/register.csv');
        $csv = Reader::createFromString($data);
        $csv->setDelimiter(";");
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $this->companies[] = new Company($record['name'], $record['regcode']);
        }
    }

    public function getCollection(): array
    {
        $this->setCollection();
        return $this->companies;
    }
}