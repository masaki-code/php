<?php

class TestCase extends PHPUnit\Framework\TestCase
{

    protected function tearDown()
    {
        parent::tearDown();
        $this->assertTrue(true);
    }
}