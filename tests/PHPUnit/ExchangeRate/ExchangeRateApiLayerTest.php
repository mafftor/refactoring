<?php

namespace PHPUnit\ExchangeRate;

use Mafftor\RefactoringTask\ExchangeRate\ExchangeRateApiLayer;
use PHPUnit\Framework\TestCase;

class ExchangeRateApiLayerTest extends TestCase
{
    private \PHPUnit\Framework\MockObject\MockObject|ExchangeRateApiLayer $subject;

    protected function setUp(): void
    {
        $this->subject = $this->createMock(ExchangeRateApiLayer::class);
    }

    /**
     * @covers \Mafftor\RefactoringTask\ExchangeRate\ExchangeRateApiLayer
     */
    public function testGet()
    {
        $currency = 'EUR';
        $extectedResult = 1;

        $this->subject->method('get')
            ->willReturn($extectedResult);

        $actualResult = $this->subject->get($currency);

        $this->assertEquals($extectedResult, $actualResult);
    }
}
