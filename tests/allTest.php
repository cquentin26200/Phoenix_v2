<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class allTest extends TestCase
{
    public function testsCalc() :void {
        $this->assertEquals(2, 2);
    }

    public function testsMulti() :void {
        $this->assertEquals(12, 6 * 2);
    }
}
