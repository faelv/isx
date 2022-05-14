<?php

use PHPUnit\Framework\TestCase;

use function Isx\is_all;
use function Isx\is_any;
use function Isx\is_empty_all;
use function Isx\is_empty_any;
use function Isx\is_false_all;
use function Isx\is_false_any;
use function Isx\is_null_all;
use function Isx\is_null_any;
use function Isx\is_true_all;
use function Isx\is_true_any;

class IsxTest extends TestCase
{

    public function testIsAll()
    {
        $this->assertTrue(
            is_all('is_int', 1, 2, 3)
        );

        $this->assertFalse(
            is_all(
                function ($value) {
                    return $value;
                },
                true,
                false
            )
        );
    }

    public function testIsAny()
    {
        $this->assertTrue(
            is_any('is_int', 'abc', 2, 0.5)
        );

        $this->assertFalse(
            is_any(
                function ($value) {
                    return $value;
                },
                false,
                false
            )
        );

        $strArray = ['abc', 'xyzw'];
        $this->assertTrue(is_any(fn($value) => strlen($value) > 3, ...$strArray));
    }

    public function testIsNullAll()
    {
        $this->assertTrue(
            is_null_all(null, null)
        );

        $this->assertFalse(
            is_null_all(null, 1)
        );
    }

    public function testIsNullAny()
    {
        $this->assertTrue(
            is_null_any(false, 1, null)
        );

        $this->assertFalse(
            is_null_any(1, 'abc', false)
        );
    }

    public function testIsFalseAll()
    {
        $this->assertTrue(
            is_false_all(false, false)
        );

        $this->assertFalse(
            is_false_all(false, true)
        );
    }

    public function testIsFalseAny()
    {
        $this->assertTrue(
            is_false_any(true, false)
        );

        $this->assertFalse(
            is_false_any(0, true)
        );
    }

    public function testIsTrueAll()
    {
        $this->assertTrue(
            is_true_all(true, true)
        );

        $this->assertFalse(
            is_true_all(true, false)
        );
    }

    public function testIsTrueAny()
    {
        $this->assertTrue(
            is_true_any(true, false)
        );

        $this->assertFalse(
            is_true_any(1, false)
        );
    }

    public function testIsEmptyAll()
    {
        $this->assertTrue(
            is_empty_all(0, 0.0, '0', '', null, false, [])
        );

        $this->assertFalse(
            is_empty_all(0, 0.0, '0', '', null, false, [], ['x'], true)
        );
    }

    public function testIsEmptyAny()
    {
        $this->assertTrue(
            is_empty_any(0, 0.0, '0', '', null, false, [], ['x'], true)
        );

        $this->assertFalse(
            is_empty_any(1, 0.5, '1', 'abc', NAN, true, [0])
        );
    }

}
