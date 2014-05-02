<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplateTest extends \PHPUnit_Framework_TestCase
{
	public function testHasNoStepsToBeginWith()
    {
        $kataTemplate = new KataTemplate();
        $this->assertCount(0, $kataTemplate->getSteps());
    }

    public function testThereIsMoreThanOneAvailableKataTemplate()
    {
        $katas = KataTemplate::getAll();
        $this->assertGreaterThan(0, count($katas));
    }
}
