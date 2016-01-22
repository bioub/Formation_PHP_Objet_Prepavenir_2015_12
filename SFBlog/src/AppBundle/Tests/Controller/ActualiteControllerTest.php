<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActualiteControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actualites');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actualites/{id}');
    }

}
