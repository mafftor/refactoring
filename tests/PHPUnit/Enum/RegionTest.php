<?php

namespace PHPUnit\Enum;

use Mafftor\RefactoringTask\Enum\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testIsEu()
    {
        $region = Region::RO;

        $actualResult = Region::isEu($region);

        $this->assertTrue($actualResult, 'The RO region marked as non European country!');
    }

    public function testIsNonEu()
    {
        $region = Region::tryFrom('UA');

        $actualResult = Region::isEu($region);

        $this->assertFalse($actualResult, 'The UA region marked as European country!');
    }
}
