<?php

namespace CodeKata\WebBundle\Tests\Classes;

use CodeKata\WebBundle\Classes\KataFileProcessor;

class KataFileProcessorsFizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    protected $kataTemplate;

    public function setUp()
    {
        parent::setUp();
        $processor = new KataFileProcessor();
        $this->kataTemplate = $processor->kataFromFile('fizzbuzz');
    }

    public function testGetKataIdFromFile()
    {
        $this->assertEquals($this->kataTemplate->getId(), 'fizzbuzz');
    }

    public function testGetKataTitleFromFile()
    {
        $this->assertEquals($this->kataTemplate->getTitle(), 'FizzBuzz');
    }

    public function testGetKataStepsFromFile()
    {
        $this->assertCount(4, $this->kataTemplate->getSteps());
    }

    public function testGetKataDescriptionFromFile()
    {
        $this->assertTrue(strpos($this->kataTemplate->getDescription(), 'multiples of three print "Fizz"') !== false);
    }
}
