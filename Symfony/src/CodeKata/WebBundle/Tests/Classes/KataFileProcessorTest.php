<?php

namespace CodeKata\WebBundle\Tests\Classes;

use CodeKata\WebBundle\Classes\KataFileProcessor;

class KataFileProcessorsTest extends \PHPUnit_Framework_TestCase
{
    public function getStub($class, array $methods)
    {
        $mock = $this->getMock($class, array_keys($methods));
        foreach($methods as $method => $returnValue) {
            $mock->expects($this->any())
                 ->method($method)
                 ->will($this->returnValue($returnValue));
        }
        return $mock;
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage The 'id' attribute is not provided.
     */
    public function testExceptionIsThrownIfIdIsNotProivdedInTheFile()
    {
        $processor = $this->getStub('\CodeKata\WebBundle\Classes\KataFileProcessor', array(
            'parseFile' => array()
        ));
        $kataTemplate = $processor->kataFromFile('fizzbuzz');
    }
}
