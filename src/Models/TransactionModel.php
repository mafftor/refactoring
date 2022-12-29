<?php

namespace Mafftor\RefactoringTask\Models;

class TransactionModel
{
    /**
     * Constructor
     *
     * @param $bin
     * @param $amount
     * @param $currency
     * @param $fixedAmount
     */
    public function __construct(
        public $bin,
        public $amount,
        public $currency,
        public $fixedAmount = null,
    )
    {
    }
}
