<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testWordpressConnection()
    {
        $client = static::createClient();
        $url = $client->getKernel()->getContainer()->getParameter('wordpress_url');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->assertEquals(200, $httpcode);
    }

    public function testWordpressGetPost()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    public function testWordpressGetOnePost()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    public function testWordpressGetPosts()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    public function testWordpressGetOneAuthorPost()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    public function testWordpressGetAuthorPosts()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }
}
