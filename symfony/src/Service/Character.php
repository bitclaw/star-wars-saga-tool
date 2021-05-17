<?php

// src/Service/Character.php
namespace App\Service;

use App\Entity\Character as CharacterEntity;
use App\Entity\Species as SpeciesEntity;
use App\Traits\GetsSpeciesEndpoints;
use Doctrine\ORM\EntityManagerInterface;

class Character
{
    use GetsSpeciesEndpoints;

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

    public function createMany(array $entities)
    {
        foreach ($entities as $entity) {
            $this->create($entity);
        }
    }

    public function create(array $characterData)
    {
        $dbCharacter = $this->characterExists($characterData);
        if (! $dbCharacter) {
            $speciesEntity = $this->insertSpecies($characterData);
            $characterEntity = new CharacterEntity();
            $characterEntity
                ->setName($characterData['name'])
                ->setGender($characterData['gender'])
                ->setSpecies($speciesEntity)
            ;

            $this->em->persist($characterEntity);
        }

        $this->em->flush();
    }

    private function insertSpecies($characterData)
    {
        $speciesEndpoint = $this->getSpeciesEndpoints($characterData);
        $speciesData = $this->swapi->fetch($speciesEndpoint[0]);

        $speciesEntity = $this->speciesExists($speciesData);
        if (! $speciesEntity) {
            $speciesEntity = new SpeciesEntity();
            $speciesEntity
                ->setName($speciesData['name'])
                ->setClassification($speciesData['classification'])
                ->setDesignation($speciesData['designation'])
                ->setAverageHeight($speciesData['average_height']);
            $this->em->persist($speciesEntity);
        }

        return $speciesEntity;
    }

    private function speciesExists($speciesData)
    {
        return $this->em->getRepository('App\Entity\Species')->findOneBy([
            'name' => $speciesData['name'],
        ]);
    }

    private function characterExists($characterData)
    {
        return $this->em->getRepository('App\Entity\Species')->findOneBy([
            'name' => $characterData['name'],
        ]);
    }
}
