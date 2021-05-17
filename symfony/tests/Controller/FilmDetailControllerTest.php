<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class FilmDetailControllerTest extends WebTestCase
{
    protected function setUp(): void
    {
        self::runCommand('doctrine:fixtures:load');
    }

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
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('user@gmail.com');
        $client->loginUser($testUser);
        $crawler = $client->request('GET', '/film-detail/2');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Film detail page');
    }
}
