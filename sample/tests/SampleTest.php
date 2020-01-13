<?php

class SampleTest extends TestCase
{

    /**
     *
     * @test
     */
    public function testOf()
    {
        $actual = Sample::of('val');
        $this->assertEquals('val', $actual->toString());
    }
}

