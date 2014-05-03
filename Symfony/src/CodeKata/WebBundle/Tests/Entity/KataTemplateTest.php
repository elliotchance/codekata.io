<?php

namespace CodeKata\WebBundle\Entity;

class KataTemplateTest extends \PHPUnit_Framework_TestCase
{
	public function testHasNoStepsToBeginWith()
    {
        $kataTemplate = new KataTemplate('mykata', 'my title');
        $this->assertCount(0, $kataTemplate->getSteps());
    }

    public function testThereIsMoreThanOneAvailableKataTemplate()
    {
        $katas = KataTemplate::getAll();
        $this->assertGreaterThan(0, count($katas));
    }

    public function testTemplatesMustBeInitialiseWithATitle()
    {
        $kataTemplate = new KataTemplate('mykata', 'my title');
        $this->assertEquals('my title', $kataTemplate->getTitle());
    }

    public function testKataMustBeGivenAnIdWhenInitialised()
    {
        $kataTemplate = new KataTemplate('mykata', 'my title');
        $this->assertEquals($kataTemplate->getId(), 'mykata');
    }

    public function testKataMustBeGivenADescriptionWhenInitialised()
    {
        $kataTemplate = new KataTemplate('mykata', 'my title', 'my desc');
        $this->assertEquals($kataTemplate->getDescription(), 'my desc');
    }
}
