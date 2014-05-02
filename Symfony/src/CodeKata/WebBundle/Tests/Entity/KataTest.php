<?php

namespace CodeKata\WebBundle\Entity;

class KataTest extends \PHPUnit_Framework_TestCase
{
    public function testCanSetAndGetCode()
    {
        $kata = new Kata();
        $kata->setCode('abc');
        $this->assertEquals('abc', $kata->getCode());
    }
}
