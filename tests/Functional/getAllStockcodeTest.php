<?php
namespace Tests\Functional;

use Silex\WebTestCase;

class ContacFormTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../../src/app.php';
        $app['debug'] = true;
        $app['exception_handler']->disable();

        return $app;
    }

    public function testGetAllStock()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertJsonStringEqualsJsonString(
            '{"00001":{"name":"Racing Car","quantity":"53","description":"...","image":"racing_car.jpg"},"00002":{"name":"Raspberry Pi","quantity":"13","description":"...","image":"raspberry_pi.jpg"}}',
            $client->getResponse()->getContent()
        );
    }
}
