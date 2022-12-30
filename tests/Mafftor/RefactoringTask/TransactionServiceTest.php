<?php

namespace Mafftor\RefactoringTask;

use PHPUnit\Framework\TestCase;

class TransactionServiceTest extends TestCase
{
    /**
     * @covers \Mafftor\RefactoringTask\TransactionService
     */
    public function testService()
    {
        $expectedResult = "1
0.46969923279327
1.4175856862858
2.442436010525
45.27386158875";

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
