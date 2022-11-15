<?php

namespace App;

class SearchName
{
    private string $searchedName;

    public function __construct(string $searchedName)
    {
        $this->searchedName = $searchedName;
    }

    public function getReasult(): array
    {
        $companyFillter = [];
        $collection = (new CompanyCollection)->getCollection();
        foreach ($collection as $company) {
            if (strpos($company->getName(), $this->searchedName)) {
                $companyFillter[] = $company;
            }
        }
        return $companyFillter;
    }
}