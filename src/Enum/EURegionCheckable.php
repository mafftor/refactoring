<?php

namespace Mafftor\RefactoringTask\Enum;

interface EURegionCheckable
{
    /**
     * Checks if the region belongs to Europe
     *
     * @param Region|null $region
     * @return bool
     */
    public static function isEu(?Region $region): bool;
}
