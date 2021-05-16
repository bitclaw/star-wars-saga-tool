<?php

namespace App\Tests\Controller;

use App\DataFixtures\UserFixture;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeControllerTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private $client;
    private $entityManager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct()
    {
        parent::__construct();
        // $this->encoder = new UserPasswordEncoderInterface();
    }

    public function setUp(): void
    {
        $this->client = static::createClient();

        // @todo: Figure out how to load fixtures automatically for some tests. Much easier in Laravel :( .
//        $container = $this->client->getContainer();
//        $doctrine = $container->get('doctrine');
//        $this->entityManager = $doctrine->getManager();
//
//        $fixture = new UserFixture($this->encoder);
//        $fixture->load($this->entityManager);
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
