<?php

namespace CodeKata\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndexHasBoxForKataCode()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals($crawler->filter('#form_code')->count(), 1);
    }

    public function testIndexHasRunButton()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals($crawler->filter('#form_run')->count(), 1);
    }
}
