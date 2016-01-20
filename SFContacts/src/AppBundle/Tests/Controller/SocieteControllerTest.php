<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SocieteControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/societes');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/societes/{id}');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/societes/ajouter');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/societes/{id}/supprimer');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/societes/{id}/modifier');
    }

}
