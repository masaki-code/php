<?php

class CalledClass
{
    public function calledMethod(?string $val): ?string
    {
        return $val;
    }

    public function calledMethodTwoArg(?string $val1, ?string $val2): string
    {
        return $val1 . ',' . $val2;
    }
}
