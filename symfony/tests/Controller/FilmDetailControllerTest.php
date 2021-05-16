<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
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
        $client = static::createClient();
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('user@gmail.com');
        $client->loginUser($testUser);
        $crawler = $client->request('GET', '/film-detail/2');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Film detail page');
    }
}
