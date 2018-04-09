<?php

function foo(bool $a, bool $b) : void
{
    if ($a) {
        echo 'A';
    }
    if ($b) {
        echo 'B';
    }
}
