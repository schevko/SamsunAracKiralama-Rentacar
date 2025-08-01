<?php

function translateTransmissionType($type){
    $translations = [
        'manual' => 'Manuel',
        'automatic' => 'Otomatik'
    ];
    return $translations[$type] ?? $type;
}

function translateFuelType($type){
    $translations = [
        'petrol' => 'Benzin',
        'diesel' => 'Dizel',
        'electric' => 'Elektrikli',
        'hybrid' => 'Hibrit'
    ];
    return $translations[$type] ?? $type;
}
