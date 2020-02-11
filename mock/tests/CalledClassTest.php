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
}

