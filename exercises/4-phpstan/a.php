<?php

namespace Exercises\Four;

class a
{
    /**
     * @var b|null
     */
    public $callable;

    private $a = [
        'a' => 'a',
        'a' => 'b',
    ];

    public function foo(string $a) {
        $this->callable->foo($a);
    }
}

class b
{
    public function foo(int $a) {}
}

$a = new a();
$a->callable = new b;
$a->foo(123, 'foo');
