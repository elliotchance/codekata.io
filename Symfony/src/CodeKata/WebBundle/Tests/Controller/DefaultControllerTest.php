<?php

namespace CodeKata\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	public function setUp()
	{
		parent::setUp();
        $client = static::createClient();
        $this->crawler = $client->request('GET', '/');
	}

    public function testIndexHasBoxForKataCode()
    {
        $this->assertEquals($this->crawler->filter('#form_code')->count(), 1);
    }

    public function testIndexHasRunButton()
    {
        $this->assertEquals($this->crawler->filter('#form_run')->count(), 1);
    }

    public function testCodeBoxIsATextArea()
    {
        $this->assertEquals($this->crawler->filter('textarea#form_code')->count(), 1);
    }

    /*public function testHasMenuToSelectKata()
    {
        $this->assertEquals($this->crawler->filter('#form_kata')->count(), 1);
    }*/
}
