<?php
use PHPUnit\Framework\TestCase;

function descendingOrder(int $n): int {
    $split_int = str_split($n);
    rsort($split_int);
    return intval(join($split_int));
}

class MyTestCases extends TestCase
{
    public function testDigits() {
        $this->assertSame(0, descendingOrder(0));
        $this->assertSame(1, descendingOrder(1));
    }

    public function testSmallNumbers() {
        $this->assertSame(51, descendingOrder(15));
        $this->assertSame(2110, descendingOrder(1021));
    }

    public function testBigNumbers() {
        $this->assertSame(987654321, descendingOrder(123456789));
    }
}