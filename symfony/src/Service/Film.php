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
}
