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

    /**
     *
     * @test
     * @dataProvider callTwoArgDataProvider
     */
    public function test_calledMethodTwoArg($val_1, $val_2, $expected)
    {
        $this->assertEquals($expected, $this->callClass->callTwoArg($val_1, $val_2));
    }

    public function callTwoArgDataProvider()
    {
        $data = [];

        $data['null / null'] = [null, null, ','];
        $data['通常 / null'] = ['hoge', null, 'hoge,'];
        $data['null / 通常'] = [null, 'fuga', ',fuga'];
        $data['通常 / 通常'] = ['hoge', 'fuga', 'hoge,fuga'];

        return $data;
    }

    /**
     *
     * @test
     * @dataProvider callTwoArgDataProvider
     */
    public function test_callTwoArgTwice($val_1, $val_2)
    {
        $this->callClass->callTwoArgTwice($val_1, $val_2);
        $this->success();
    }

    public function callTwoArgTwiceDataProvider()
    {
        $data = [];
        $data['null / null'] = [null, null];
        $data['通常 / null'] = ['hoge', null];
        $data['null / 通常'] = [null, 'fuga'];
        $data['通常 / 通常'] = ['hoge', 'fuga'];
        return $data;
    }
}
