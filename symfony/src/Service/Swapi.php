<?php

// src/Service/Swapi.php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Swapi
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchFilms(): array
    {
        $response = $this->client->request(
            'GET',
            'https://swapi.dev/api/films/'
        );

        return $response->toArray();
    }
}
