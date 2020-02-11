<?php

/**
 *  test case.
 */
class CallClassTest extends TestCase
{

    /**
     *
     * @var CalledClass
     */
    private $calledClass;

    /**
     *
     * @var CallClass
     */
    private $callClass;

    /**
     *
     * @before
     */
    public function before()
    {
        $this->calledClass = new CalledClass();
        $this->callClass = new CallClass($this->calledClass);
    }

    /**
     *
     * @test
     * @dataProvider callOnceDataProvider
     */
    public function test_callOnce($val)
    {
        $this->assertEquals($val, $this->callClass->callOnce($val));
    }

    public function callOnceDataProvider()
    {
        $data = [];

        $data['null'] = [null];
        $data['空文字'] = [''];
        $data['通常'] = ['test'];

        return $data;
    }

    /**
     *
     * @test
     */
    public function test_callTwice()
    {
        $this->callClass->callTwice();
        $this->success();
    }
}

