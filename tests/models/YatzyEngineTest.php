<?php
namespace Yatzy\Test;

use Yatzy\YatzyEngine;
use PHPUnit\Framework\TestCase;

class YatzyEngineTest extends TestCase
{

    public function testConstructor()
    {
        $engine = new YatzyEngine();
        $this->assertEquals(1, 1);
    }
}