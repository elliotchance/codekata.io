<?php

namespace CodeKata\WebBundle\Tests\Classes;

use CodeKata\WebBundle\Classes\KataFileProcessor;

class KataFileProcessorsTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateKataIdFromFile()
    {
        $processor = new KataFileProcessor();
        $kataTemplate = $processor->kataFromFile('FizzBuzz.yml');
        $this->assertEquals($kataTemplate->getId(), 'fizzbuzz');
    }
}
