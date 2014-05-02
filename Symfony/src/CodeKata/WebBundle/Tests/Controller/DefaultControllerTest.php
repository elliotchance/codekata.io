<?php

namespace CodeKata\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CodeKata\WebBundle\Controller\DefaultController;
use CodeKata\WebBundle\Entity\KataTemplate;

class DefaultControllerTest extends WebTestCase
{
	public function setUpCrawler()
	{
        $client = static::createClient();
        $this->crawler = $client->request('GET', '/');
	}

    public function testIndexHasBoxForKataCode()
    {
    	$this->setUpCrawler();
        $this->assertEquals($this->crawler->filter('#form_code')->count(), 1);
    }

    public function testIndexHasRunButton()
    {
    	$this->setUpCrawler();
        $this->assertEquals($this->crawler->filter('#form_run')->count(), 1);
    }

    public function testCodeBoxIsATextArea()
    {
    	$this->setUpCrawler();
        $this->assertEquals($this->crawler->filter('textarea#form_code')->count(), 1);
    }

    public function testHasMenuToSelectKata()
    {
    	$this->setUpCrawler();
        $this->assertEquals($this->crawler->filter('#form_kataTemplate')->count(), 1);
    }

    public function testKataTemplatesWillHaveMoreThanZeroItems()
    {
    	$this->setUpCrawler();
        $this->assertGreaterThan(0, $this->crawler->filter('#form_kataTemplate option')->count());
    }

    public function testGetKatasReturnsTheDefaultKatas()
    {
    	$controller = new DefaultController();
    	$this->assertEquals($controller->getKatas(), KataTemplate::getAll());
    }

    public function testCanTranslateKatasIntoMenuChoices()
    {
    	$katas = array(
			new KataTemplate('abc'),
			new KataTemplate('def')
		);
    	$controller = $this->getMock('CodeKata\WebBundle\Controller\DefaultController', array('getKatas'));
    	$controller->expects($this->once())
    	           ->method('getKatas')
    	           ->will($this->returnValue($katas));

    	$items = $controller->getKataMenuItems();
    	$this->assertEquals(array(
    		'abc' => 'abc',
    		'def' => 'def'
    	), $items);
    }

    public function testKataTemplatesWillHaveTheSameAmountAsKatas()
    {
    	$this->setUpCrawler();
    	$countKatas = count(KataTemplate::getAll());
        $this->assertEquals($countKatas, $this->crawler->filter('#form_kataTemplate option')->count());
    }
}
