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

    public function fetch($endpoint): array
    {
        $response = $this->client->request(
            'GET',
            $endpoint
        );

        return $response->toArray();
    }
}
