<?php

class CallClass
{

    /**
     *
     * @var CalledClass
     */
    private $called;

    /**
     *
     * @param CalledClass $called
     */
    public function __construct(CalledClass $called)
    {
        $this->called = $called;
    }

    public function callOnce(?string $val): ?string
    {
        return $this->called->calledMethod($val);
    }

    public function callTwice()
    {
        $this->called->calledMethod('one');
        $this->called->calledMethod('two');
    }

    public function callTwoArg(?string $val1, ?string $val2): string
    {
        return $this->called->calledMethodTwoArg($val1, $val2);
    }

    public function callTwoArgTwice(?string $val1, ?string $val2)
    {
        $this->called->calledMethodTwoArg('one', $val1);
        $this->called->calledMethodTwoArg('two', $val2);
    }
}
