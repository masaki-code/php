<?php

/**
 * エラーコード
 */
class ErrorCode
{
    private $code;

    private function __construct($code)
    {
        $this->code = $code;
    }

    public static function EMPTY_1(): self
    {
        return new ErrorCode('EMPTY_1');
    }

    public static function EMPTY_2(): self
    {
        return new ErrorCode('EMPTY_2');
    }

    public static function INVALID(): self
    {
        return new ErrorCode('INVALID');
    }

    public function get()
    {
        return $this->code;
    }
}
