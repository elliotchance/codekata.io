<?php

namespace CodeKata\WebBundle\Tests\Classes;

use CodeKata\WebBundle\Classes\KataFileProcessor;

class KataFileProcessorsTest extends \PHPUnit_Framework_TestCase
{
    protected $kataTemplate;

    public function setUp()
    {
        parent::setUp();
        $processor = new KataFileProcessor();
        $this->kataTemplate = $processor->kataFromFile('FizzBuzz.yml');
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
        $this->assertEquals($this->kataTemplate->getSteps(), array(
            'Step 1',
            'Step 2'
        ));
    }
}
