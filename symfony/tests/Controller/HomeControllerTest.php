<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private $client;

    public function setUp(): void
    {
        self::runCommand('doctrine:fixtures:load');
        $this->client = static::createClient();
    }

    public function testFilmPageWhileNotLoggedIn(): void
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertSelectorTextContains('title', 'Redirecting to /login');
        $this->assertResponseRedirects();
    }

    public function testFilmPageWhileLoggedIn(): void
    {
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('user@gmail.com');
        $this->client->loginUser($testUser);
        $this->client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Film master page');
    }
}
