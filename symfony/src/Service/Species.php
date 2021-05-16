<?php

// src/Service/Species.php
namespace App\Service;

use App\Entity\Species as SpeciesEntity;
use Doctrine\ORM\EntityManagerInterface;

class Species
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createMany(array $species)
    {
        foreach ($species as $type) {
            $this->create($type);
        }
    }

    public function create(array $species)
    {
        $entity = new SpeciesEntity();
        $entity
            ->setName($species['name'])
            ->setClassification($species['classification'])
            ->setDesignation($species['designation'])
            ->setAverageHeight($species['average_height'])
        ;

        $this->em->persist($entity);
        $this->em->flush();
    }
}
