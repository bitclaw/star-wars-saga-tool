<?php

// src/Service/Species.php
namespace App\Service;

use App\Entity\Character;
use App\Entity\Species as SpeciesEntity;
use Doctrine\ORM\EntityManagerInterface;

class Species
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em, Swapi $swapi)
    {
        $this->em = $em;
        $this->swapi = $swapi;
    }

    public function createMany(array $species)
    {
        foreach ($species as $type) {
            $this->create($type);
        }
    }

    public function create(Character $character)
    {
        $speciesEndpoint = $character->getSpeciesEndpoints();
        $response = $this->swapi->fetch($speciesEndpoint[0]);
        $species = new SpeciesEntity();
        $species
            ->setName($response['name'])
            ->setClassification($response['classification'])
            ->setDesignation($response['designation'])
            ->setAverageHeight($response['average_height'])
        ;
        $character->setSpecies($species);

        $this->em->persist($species);
        $this->em->persist($character);
        $this->em->flush();
    }
}
