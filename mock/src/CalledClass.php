<?php

class CalledClass
{

    /**
     *
     * @var string
     */
    private $value;

    public function calledMethod(?string $val): ?string
    {
        return $this->value = $val;
    }
}
