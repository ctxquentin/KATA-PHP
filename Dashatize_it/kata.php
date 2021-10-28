<?php
use PHPUnit\Framework\TestCase;

//Given a variable n,
//
//If n is an integer, Return a string with dash'-'marks before and after each odd integer, but do not begin or end the string with a dash mark. If n is negative, then the negative sign should be removed.
//
//If n is not an integer, return an empty value.

function dashatize(int $num): string {
    if($num < 0) $num = abs($num);
    return preg_replace('/(--)/', '-',trim(implode('', array_map(function ($a) {return ($a % 2 !== 0 ? '-'.$a.'-' : $a );}, str_split($num))), '-'));
}

class MyTestCases extends TestCase
{
    public function testBasic() {
        $this->assertEquals('2-7-4', dashatize(274));
        $this->assertEquals('5-3-1-1', dashatize(5311));
        $this->assertEquals('86-3-20', dashatize(86320));
        $this->assertEquals('9-7-4-3-02', dashatize(974302));
    }

    public function testWeird() {
        $this->assertEquals('0', dashatize(0));
        $this->assertEquals('1', dashatize(-1));
        $this->assertEquals('28-3-6-9', dashatize(-28369));
    }
}