<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FilmDetailControllerTest extends WebTestCase
{
    public function testFilmPageWhileNotLoggedIn(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'film-detail/2');
        $this->assertSelectorTextContains('title', 'Redirecting to /login');
        $this->assertResponseRedirects();
    }

    public function testFilmPageWhileLoggedIn(): void
    {
        $this->markTestIncomplete();
        $client = static::createClient();
        $crawler = $client->request('GET', '/film-detail/2');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Film detail page');
    }
}
