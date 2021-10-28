<?php
use PHPUnit\Framework\TestCase;

function human_readable($seconds) : string {
    $rest = $seconds;
    $time = [];
    $time[] = sprintf('%02d',floor($seconds / 3600));
    $rest = $rest % 3600;
    $time[] = sprintf('%02d', floor($rest / 60));
    $time[] = sprintf('%02d',$rest % 60);
    return implode(':', $time);
}

// MUCH CLEANER SOLUTION
function human_readable2(int $seconds): string
{
    return sprintf('%02d:%02d:%02d', $seconds / 3600, ($seconds % 3600) / 60, $seconds % 60);
}

class MyExampleTestCases extends TestCase  {

    public function testBasicTests(){
        $this->assertEquals('00:00:00', human_readable(0));
        $this->assertEquals('00:00:05', human_readable(5));
        $this->assertEquals('00:01:00', human_readable(60));
        $this->assertEquals('23:59:59', human_readable(86399));
        $this->assertEquals('99:59:59', human_readable(359999));
    }
}