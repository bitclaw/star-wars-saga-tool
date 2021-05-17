<?php

// src/Service/Character.php
namespace App\Service;

use App\Entity\Character as CharacterEntity;
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

    public function create(array $data)
    {
        $entity = new CharacterEntity();
//        $speciesEndpoint = $this->getSpeciesEndpoints($data);
//        $person = $this->swapi->fetch($speciesEndpoint[0]);
//
//        $exists = $this->em->getRepository('App\Entity\Species')->findOneBy([
//            'name' => $data['name'],
//        ]);

        $entity
            ->setName($data['name'])
            ->setGender($data['gender'])
            ->setSpeciesEndpoints($data['species'])
        ;

        $this->em->persist($entity);
        $this->em->flush();
    }
}
