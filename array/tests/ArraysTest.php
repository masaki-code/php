<?php

/**
 * test case.
 */
class ArraysTest extends TestCase
{

    /**
     *
     * @test
     */
    public function test___construct()
    {
        $array = [];
        $actual = new Arrays($array);
        $this->assertInstanceOf(Arrays::class, $actual);
    }

    /**
     *
     * @test
     */
    public function test_checkArrays_success()
    {
        $array = $this->correctParams();
        $arrays = new Arrays($array);

        $actual = $arrays->checkArrays();

        $this->assertInstanceOf(Arrays::class, $actual);
    }

    /**
     *
     * @test
     * @expectedException InnerException
     * @dataProvider emptyDataProvider
     * @dataProvider emptyStringDataProvider
     * @dataProvider invalidDataProvider
     */
    public function test_checkArrays_Exception($array, $msg, $code)
    {
        try {
            $arrays = new Arrays($array);
            $arrays->checkArrays();
        } catch (InnerException $e) {
            $this->assertEquals($msg, $e->getMessage());
            $this->assertEquals($code, $e->errorCode()->get());
            throw $e;
        }

        $this->fail('fail');
    }

    /**
     * dataProvider
     */
    public function emptyDataProvider()
    {
        $arrays = [];
        $arrays['key_1 empty test'] = [$this->empty('key_1')];
        $arrays['key_2 empty test'] = [$this->empty('key_2')];
        $arrays['key_3 empty test'] = [$this->empty('key_3')];
        $arrays['key_4 empty test'] = [$this->empty('key_4')];
        $arrays['key_5 empty test'] = [$this->empty('key_5')];
        $arrays['key_6 empty test'] = [$this->empty('key_6')];

        $msg = [];
        $msg['key_1 empty test'] = ['key_1 empty'];
        $msg['key_2 empty test'] = ['key_2 empty'];
        $msg['key_3 empty test'] = ['key_3 empty'];
        $msg['key_4 empty test'] = ['key_4 empty'];
        $msg['key_5 empty test'] = ['key_5 empty'];
        $msg['key_6 empty test'] = ['key_6 empty'];

        $code = [];
        $code['key_1 empty test'] = ['EMPTY_1'];
        $code['key_2 empty test'] = ['EMPTY_2'];
        $code['key_3 empty test'] = ['EMPTY_1'];
        $code['key_4 empty test'] = ['EMPTY_2'];
        $code['key_5 empty test'] = ['EMPTY_1'];
        $code['key_6 empty test'] = ['EMPTY_2'];

        $p = array_merge_recursive($arrays, $msg, $code);

        return $p;
    }

    /**
     * dataProvider
     */
    public function emptyStringDataProvider()
    {
        $arrays = [];
        $arrays['key_1 empty string test'] = [$this->set('key_1', '')];
        $arrays['key_2 empty string test'] = [$this->set('key_2', '')];
        $arrays['key_3 empty string test'] = [$this->set('key_3', '')];
        $arrays['key_4 empty string test'] = [$this->set('key_4', '')];
        $arrays['key_5 empty string test'] = [$this->set('key_5', '')];
        $arrays['key_6 empty string test'] = [$this->set('key_6', '')];

        $msg = [];
        $msg['key_1 empty string test'] = ['key_1 empty'];
        $msg['key_2 empty string test'] = ['key_2 empty'];
        $msg['key_3 empty string test'] = ['key_3 empty'];
        $msg['key_4 empty string test'] = ['key_4 empty'];
        $msg['key_5 empty string test'] = ['key_5 empty'];
        $msg['key_6 empty string test'] = ['key_6 empty'];

        $code = [];
        $code['key_1 empty string test'] = ['EMPTY_1'];
        $code['key_2 empty string test'] = ['EMPTY_2'];
        $code['key_3 empty string test'] = ['EMPTY_1'];
        $code['key_4 empty string test'] = ['EMPTY_2'];
        $code['key_5 empty string test'] = ['EMPTY_1'];
        $code['key_6 empty string test'] = ['EMPTY_2'];

        $p = array_merge_recursive($arrays, $msg, $code);

        return $p;
    }

    /**
     * dataProvider
     */
    public function invalidDataProvider()
    {
        $arrays = [];
        $arrays['key_1 invalid test'] = [$this->set('key_1', 'illegal')];
        $arrays['key_2 invalid test'] = [$this->set('key_2', 'illegal')];
        $arrays['key_3 invalid test'] = [$this->set('key_3', 'illegal')];
        $arrays['key_4 invalid test'] = [$this->set('key_4', 'illegal')];
        $arrays['key_5 invalid test'] = [$this->set('key_5', 'illegal')];
        $arrays['key_6 invalid test'] = [$this->set('key_6', 'illegal')];

        $msg = [];
        $msg['key_1 invalid test'] = ['key_1 invalid'];
        $msg['key_2 invalid test'] = ['key_2 invalid'];
        $msg['key_3 invalid test'] = ['key_3 invalid'];
        $msg['key_4 invalid test'] = ['key_4 invalid'];
        $msg['key_5 invalid test'] = ['key_5 invalid'];
        $msg['key_6 invalid test'] = ['key_6 invalid'];

        $code = [];
        $code['key_1 invalid test'] = ['INVALID'];
        $code['key_2 invalid test'] = ['INVALID'];
        $code['key_3 invalid test'] = ['INVALID'];
        $code['key_4 invalid test'] = ['INVALID'];
        $code['key_5 invalid test'] = ['INVALID'];
        $code['key_6 invalid test'] = ['INVALID'];

        $p = array_merge_recursive($arrays, $msg, $code);

        return $p;
    }

    private function set($key, $value)
    {
        $array = $this->correctParams();
        $array[$key] = $value;
        return $array;
    }

    private function empty($key)
    {
        $array = $this->correctParams();
        unset($array[$key]);
        return $array;
    }

    private function correctParams(): array
    {
        $array = [];
        $array['key_1'] = 'value_1_A';
        $array['key_2'] = 'value_2_A';
        $array['key_3'] = 'value_3_A';
        $array['key_4'] = 'value_4_A';
        $array['key_5'] = 'value_5_A';
        $array['key_6'] = 'value_6_A';
        return $array;
    }
}
