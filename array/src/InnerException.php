<?php

/**
 * 例外
 */
class InnerException extends \Exception
{

    /**
     *
     * @var ErrorCode
     */
    private $errorCode;

    public function __construct(string $message, ErrorCode $errorCode)
    {
        parent::__construct($message);
        $this->errorCode = $errorCode;
    }

    public function errorCode(): ErrorCode
    {
        return $this->errorCode;
    }
}
