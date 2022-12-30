<?php

namespace Mafftor\RefactoringTask;

use Mafftor\RefactoringTask\Bin\BinService;
use Mafftor\RefactoringTask\Enum\Region;
use Mafftor\RefactoringTask\ExchangeRate\ExchangeRateService;
use Mafftor\RefactoringTask\Models\TransactionModel;

class TransactionService
{
    private $transactions;

    /**
     * Constructor
     *
     * @param BinService $binService
     * @param ExchangeRateService $exchangeRateService
     */
    public function __construct(
        private readonly BinService          $binService,
        private readonly ExchangeRateService $exchangeRateService
    )
    {
    }

    /**
     * Parse the file of transactions
     *
     * @param string|null $filepath
     * @return $this
     */
    public function parse(?string $filepath): TransactionService
    {
        $file = fopen($filepath, 'r');
        while (!feof($file)) {
            $line = fgets($file);
            $data = json_decode($line, true);

            if (empty($data)) {
                continue;
            }

            $this->transactions[] = new TransactionModel($data['bin'], $data['amount'], $data['currency']);
        }

        return $this;
    }

    /**
     * Loop through transactions and process fixed amount
     *
     * @return $this
     */
    public function processFixedAmount(): TransactionService
    {
        foreach ($this->transactions as &$transaction) {
            $transaction->fixedAmount = $this->getAmountByCurrency($transaction) * ($this->isEuropeanBin($transaction->bin) ? 0.01 : 0.02);
        }

        return $this;
    }

    /**
     * Prints the result
     *
     * @return void
     */
    public function print(): string
    {
        $result = '';
        foreach ($this->transactions as $transaction) {
            $result .= $transaction->fixedAmount . PHP_EOL;
        }

        return $result;
    }

    /**
     * Checks if transaction belong to Europe
     *
     * @param int $bin
     * @return bool
     */
    private function isEuropeanBin(int $bin): bool
    {
        $region = Region::tryFrom($this->binService->fetch($bin)->getCountryCode());
        return Region::isEu($region);
    }

    /**
     * Process amount by currency code
     *
     * @param TransactionModel $transaction
     * @return float|int
     */
    private function getAmountByCurrency(TransactionModel $transaction)
    {
        $rate = $this->exchangeRateService->get($transaction->currency);

        if ($transaction->currency == 'EUR' || $rate == 0) {
            $amountFixed = $transaction->amount;
        }

        if ($transaction->currency != 'EUR' || $rate > 0) {
            $amountFixed = $transaction->amount / $rate;
        }

        return $amountFixed;
    }
}
