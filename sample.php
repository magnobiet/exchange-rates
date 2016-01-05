<?php

require_once 'vendor/autoload.php';
require_once 'ExchangeRates.php';

$er   = new ExchangeRates(220); // Euro
$data = $er->get();

header('Content-type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

echo json_encode($data);
