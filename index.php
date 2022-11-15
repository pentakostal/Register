<?php
namespace App;

require_once 'vendor/autoload.php';

while (true) {
    echo "------------------------------" . PHP_EOL;
    echo "Choose option for search" . PHP_EOL;
    echo "1. Search by name" . PHP_EOL;
    echo "2. Serch by register code" . PHP_EOL;
    echo "3. Exit" . PHP_EOL;
    echo "------------------------------" . PHP_EOL;

    $choice = readline("-> ");

    switch ($choice) {
        case 1:
            $name = (string)readline("Enter name: ->");
            $resaults = array_slice((new SearchName($name))->getReasult(), -30, 30);
            $n = 1;
            foreach ($resaults as $resault) {
                echo "${n})" . $resault->getName() . " Register code: " . $resault->getRegistrationCode() . PHP_EOL;
                $n++;
            };
            break;
        case 2:
            $regCode = (string)readline("Enter register code: ->");
            $resaults = array_slice((new SearchRegCode($regCode))->getReasult(), -30, 30);
            $n = 1;
            foreach ($resaults as $resault) {
                echo "${n})" . $resault->getName() . " Register code: " . $resault->getRegistrationCode() . PHP_EOL;
                $n++;
            };
            break;
        case 3:
            die;
        default :
            echo "Wrong choice, try another" . PHP_EOL;
    }
}
