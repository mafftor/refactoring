<?php

namespace Mafftor\RefactoringTask\ExchangeRate;

class ExchangeRateApiLayer implements ExchangeRateService
{
    public const API_URL = 'https://api.apilayer.com/exchangerates_data/latest';

    /**
     * Constructor
     *
     * @param $apikey
     */
    public function __construct(
        private $apikey
    )
    {
    }

    /**
     * Get fresh exchange rate
     *
     * @param string $currency
     * @return mixed
     */
    public function get(string $currency)
    {
        $result = file_get_contents(self::API_URL . '?apikey=' . $this->apikey);
        $data = json_decode($result, true);

        return @$data['rates'][$currency];
    }
}
