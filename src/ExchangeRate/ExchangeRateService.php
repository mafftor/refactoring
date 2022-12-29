<?php

namespace Mafftor\RefactoringTask\ExchangeRate;

interface ExchangeRateService
{
    /**
     * Get fresh exchange rate
     *
     * @param string $currency
     * @return mixed
     */
    public function get(string $currency);
}
