<?php

namespace CodeKata\WebBundle\Entity;

class KataTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->kata = new Kata();
	}

    public function testCanSetAndGetCode()
    {
        $this->kata->setCode('abc');
        $this->assertEquals('abc', $this->kata->getCode());
    }

    public function testDefaultCodeIsBlank()
    {
        $this->assertEquals('', $this->kata->getCode());
    }
}
