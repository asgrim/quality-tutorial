<?php
declare(strict_types=1);

namespace ExercisesTest\Eight;

use Exercises\Eight\A;
use PHPUnit\Framework\TestCase;

final class ATest extends TestCase
{
    public function testAddition() : void
    {
        $result = (new A())->add(2, 3);

//        self::assertSame(5, $result);
    }
}
