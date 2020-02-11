<?php

/**
 *  test case.
 */
class MockObjectsTest extends TestCase
{

    /**
     * モックオブジェクトを使ってメソッドが一度だけ呼び出されていることを検証するテスト
     *
     * @test
     */
    public function test_callOnce()
    {
        $val = 'test';

        $called = $this->createMock(CalledClass::class);

        $called->expects($this->once())
            ->method('calledMethod')
            ->with($this->equalTo($val));

        $target = new CallClass($called);

        $target->callOnce($val);
    }

    /**
     * モックオブジェクトを使ってメソッドが指定回数だけ呼び出されていることを検証するテスト
     *
     * @test
     */
    public function test_callTwice()
    {
        $called = $this->createMock(CalledClass::class);
        $called->expects($this->exactly(2))
            ->method('calledMethod')
            ->withConsecutive([$this->equalTo('one')], [$this->equalTo('two')]);

        $target = new CallClass($called);

        $target->callTwice();
    }
}
