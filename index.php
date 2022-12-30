<?php

use Mafftor\RefactoringTask\Bin\BinList;
use Mafftor\RefactoringTask\ExchangeRate\ExchangeRateApiLayer;
use Mafftor\RefactoringTask\TransactionService;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// Client code below

$transactionService = new TransactionService(
    new BinList(),
    new ExchangeRateApiLayer($_ENV['API_KEY'])
);

echo $transactionService->parse($argv[1])
    ->processFixedAmount()
    ->print();
