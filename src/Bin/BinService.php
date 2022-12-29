<?php

namespace Mafftor\RefactoringTask\Bin;

interface BinService
{
    /**
     * Send GET request to get fresh data
     *
     * @param int $bin
     * @return BinService
     */
    public function fetch(int $bin): BinService;

    /**
     * Returns the country code of BIN
     *
     * @return string|null
     */
    public function getCountryCode(): ?string;
}
