<?php

namespace Mafftor\RefactoringTask\Bin;

use PHPUnit\Framework\TestCase;

class BinListTest extends TestCase
{
    private \PHPUnit\Framework\MockObject\MockObject|BinList $subject;

    protected function setUp(): void
    {
        $this->subject = $this->createMock(BinList::class);
    }

    public function testGetCountryCode()
    {
        $bin = 45717360;
        $extectedResult = 'DK';

        $this->subject->method('fetch')
            ->willReturn($this->subject);

        $this->subject->method('getCountryCode')
            ->willReturn($extectedResult);

        $actualResult = $this->subject->fetch($bin)->getCountryCode();

        $this->assertEquals($extectedResult, $actualResult);
    }
}
