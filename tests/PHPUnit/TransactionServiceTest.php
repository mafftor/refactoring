<?php

namespace PHPUnit;

use Mafftor\RefactoringTask\TransactionService;
use PHPUnit\Framework\TestCase;

class TransactionServiceTest extends TestCase
{
    /**
     * @covers \Mafftor\RefactoringTask\TransactionService
     */
    public function testService()
    {
        $expectedResult = "1
0.47
1.42
2.44
45.26";

        $subject = $this->createMock(TransactionService::class);

        $subject->method('parse')
            ->willReturn($subject);

        $subject->method('processFixedAmount')
            ->willReturn($subject);

        $subject->method('print')
            ->willReturn($expectedResult);

        $actualResult = $subject->parse('input.txt')
            ->processFixedAmount()
            ->print();

        $this->assertEquals($expectedResult, $actualResult);
    }
}
