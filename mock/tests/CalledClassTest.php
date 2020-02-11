<?php

/**
 *  test case.
 */
class CalledClassTest extends TestCase
{

    /**
     *
     * @var CalledClass
     */
    private $target;

    /**
     *
     * @before
     */
    public function before()
    {
        $this->target = new CalledClass();
    }

    /**
     *
     * @test
     * @dataProvider calledMethodDataProvider
     */
    public function test_calledMethod($value)
    {
        $this->assertEquals($value, $this->target->calledMethod($value));
    }

    public function calledMethodDataProvider()
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
     * @dataProvider calledMethodTwoArgDataProvider
     */
    public function test_calledMethodTwoArg($val_1, $val_2, $expected)
    {
        $this->assertEquals($expected, $this->target->calledMethodTwoArg($val_1, $val_2));
    }

    public function calledMethodTwoArgDataProvider()
    {
        $data = [];

        $data['null / null'] = [null, null, ','];
        $data['通常 / null'] = ['hoge', null, 'hoge,'];
        $data['null / 通常'] = [null, 'fuga', ',fuga'];
        $data['通常 / 通常'] = ['hoge', 'fuga', 'hoge,fuga'];

        return $data;
    }
}
