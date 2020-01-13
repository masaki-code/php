<?php

class Arrays
{

    /**
     *
     * @var array
     */
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * チェック
     */
    public function checkArrays(): self
    {
        $value_1 = $this->checkEmpty('key_1', 'key_1 empty', ErrorCode::EMPTY_1());
        $value_2 = $this->checkEmpty('key_2', 'key_2 empty', ErrorCode::EMPTY_2());
        $value_3 = $this->checkEmpty('key_3', 'key_3 empty', ErrorCode::EMPTY_1());
        $value_4 = $this->checkEmpty('key_4', 'key_4 empty', ErrorCode::EMPTY_2());
        $value_5 = $this->checkEmpty('key_5', 'key_5 empty', ErrorCode::EMPTY_1());
        $value_6 = $this->checkEmpty('key_6', 'key_6 empty', ErrorCode::EMPTY_2());

        $this->checkInvalid($value_1, ['value_1_A'], 'key_1 invalid', ErrorCode::INVALID());
        $this->checkInvalid($value_2, ['value_2_A'], 'key_2 invalid', ErrorCode::INVALID());
        $this->checkInvalid($value_3, ['value_3_A'], 'key_3 invalid', ErrorCode::INVALID());
        $this->checkInvalid($value_4, ['value_4_A'], 'key_4 invalid', ErrorCode::INVALID());
        $this->checkInvalid($value_5, ['value_5_A'], 'key_5 invalid', ErrorCode::INVALID());
        $this->checkInvalid($value_6, ['value_6_A'], 'key_6 invalid', ErrorCode::INVALID());

        return $this;
    }

    private function checkInvalid($value, array $correct, $message, ErrorCode $errorCode)
    {
        if (in_array($value, $correct)) {
            return true;
        }

        throw new InnerException($message, $errorCode);
    }

    /**
     * 空チェック
     */
    private function checkEmpty($key, $message, ErrorCode $errorCode)
    {
        if (self::isEmpty($this->array, $key)) {
            throw new InnerException($message, $errorCode);
        }

        return $this->array[$key];
    }

    /**
     * 空チェック
     */
    private static function isEmpty($param, $key)
    {
        if (! isset($param[$key])) {
            return true;
        }

        $value = $param[$key];

        if (is_string($value) && $value === '') {
            return true;
        }

        return false;
    }
}
