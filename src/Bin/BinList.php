<?php

namespace Mafftor\RefactoringTask\Bin;

class BinList implements BinService
{
    public const API_URL = 'https://lookup.binlist.net/';

    private $binInfo;

    /**
     * Send GET request to get fresh data
     *
     * @param int $bin
     * @return BinService
     */
    public function fetch(int $bin): BinService
    {
        $result = file_get_contents(self::API_URL . $bin);
        $this->binInfo = json_decode($result, true);

        return $this;
    }

    /**
     * Returns the country code of BIN
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->binInfo['country']['alpha2'] ?? null;
    }
}
