<?php

namespace App;

class SearchRegCode
{
    private string $searchedRegCode;

    public function __construct(string $searchedRegCode)
    {
        $this->searchedRegCode = $searchedRegCode;
    }

    public function getReasult(): array
    {
        $companyFillter = [];
        $collection = (new CompanyCollection)->getCollection();

        foreach ($collection as $company) {
            //var_dump($company->getRegistrationCode());
            if (strpos($company->getRegistrationCode(), $this->searchedRegCode) !== false) {
                $companyFillter[] = $company;
            }
        }
        return $companyFillter;
    }
}
