<?php

class Sample
{

    /**
     *
     * @var string
     */
    private $val;

    private function __construct(string $val)
    {
        $this->val = $val;
    }

    public static function of(string $val)
    {
        return new sample($val);
    }

    public function toString()
    {
        return $this->val;
    }
}
