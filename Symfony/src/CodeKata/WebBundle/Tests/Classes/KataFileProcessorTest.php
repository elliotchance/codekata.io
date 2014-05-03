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

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage The 'title' attribute is not provided.
     */
    public function testExceptionIsThrownIfTitleIsNotProivdedInTheFile()
    {
        $processor = $this->getStub('\CodeKata\WebBundle\Classes\KataFileProcessor', array(
            'parseFile' => array('id' => 'bla')
        ));
        $kataTemplate = $processor->kataFromFile('fizzbuzz');
    }

    public function testDescriptionIsOptional()
    {
        $processor = $this->getStub('\CodeKata\WebBundle\Classes\KataFileProcessor', array(
            'parseFile' => array('id' => 'foo', 'title' => 'bar')
        ));
        $kataTemplate = $processor->kataFromFile('fizzbuzz');
        $this->assertNull($kataTemplate->getDescription());
    }

    public function testStepsIsOptional()
    {
        $processor = $this->getStub('\CodeKata\WebBundle\Classes\KataFileProcessor', array(
            'parseFile' => array('id' => 'foo', 'title' => 'bar')
        ));
        $kataTemplate = $processor->kataFromFile('fizzbuzz');
        $this->assertCount(0, $kataTemplate->getSteps());
    }
}
