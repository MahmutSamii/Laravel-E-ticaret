<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    const APPLY_ON_COSTS = 1;
    const APPLY_ON_VALUE = 2;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $a = '11';
        dd(self::APPLY_ON_COSTS);
        $this->assertTrue(true);
    }
}
