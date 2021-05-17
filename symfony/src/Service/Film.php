<?php

// src/Service/Film.php
namespace App\Service;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film as FilmEntity;

class Film
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var Swapi
     */
    private $swapi;

    public function __construct(EntityManagerInterface $em, Swapi $swapi)
    {
        $this->em = $em;
        $this->swapi = $swapi;
    }

    public function createMany(array $films)
    {
        foreach ($films as $film) {
            $this->create($film);
        }
    }

    public function create(array $film)
    {
        $entity = new FilmEntity();
        $entity
            ->setTitle($film['title'])
            ->setDirector($film['director'])
            ->setReleaseDate($film['release_date'])
            ->setCharacterEndpoints($film['characters'])
        ;

        $this->em->persist($entity);
        $this->em->flush();
    }

    public function addCharacters(\App\Entity\Film $film)
    {
        $batchSize = 20;
        $endpoints = $film->getCharacterEndpoints();
        $i = count($endpoints);
        foreach($endpoints as $endpoint) {
            $response = $this->swapi->fetch($endpoint);
            $character = new Character;
            $character->setName($response['name']);
            $character->setGender($response['gender']);
            $speciesEndpoints = $this->getSpeciesEndpoints($response);
            $character->setSpeciesEndpoints($speciesEndpoints);
            $film->addCharacter($character);
            $this->em->persist($character);

            if (($i % $batchSize) === 0) {
                $this->em->flush();
                $this->em->clear(); // Detaches all objects from Doctrine!
            }
        }
        $this->em->flush(); //Persist objects that did not make up an entire batch
        $this->em->clear();
    }

    /**
     *
     * This is the simplest way since for humans the species array comes back zero so we know in this case it will be
     * the endpoint https://swapi.dev/api/species/1/.
     *
     * @param array $response
     * @return mixed|string[]
     */
    private function getSpeciesEndpoints(array $response)
    {
        return count($response['species']) > 0 ? $response['species'] : ['https://swapi.dev/api/species/1/'];
    }
}
