<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplateTest extends \PHPUnit_Framework_TestCase
{
	public function testHasNoStepsToBeginWith()
    {
        $kataTemplate = new KataTemplate('my kata');
        $this->assertCount(0, $kataTemplate->getSteps());
    }

    public function testThereIsMoreThanOneAvailableKataTemplate()
    {
        $katas = KataTemplate::getAll();
        $this->assertGreaterThan(0, count($katas));
    }

    public function testTemplatesMustBeInitialiseWithATitle()
    {
        $kataTemplate = new KataTemplate('my title');
        $this->assertEquals('my title', $kataTemplate->getTitle());
    }
}
