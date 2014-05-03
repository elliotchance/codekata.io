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

    public function testCanCreateKataIdFromFile()
    {
        $this->assertEquals($this->kataTemplate->getId(), 'fizzbuzz');
    }

    public function testCanCreateKataTitleFromFile()
    {
        $this->assertEquals($this->kataTemplate->getTitle(), 'FizzBuzz');
    }
}
