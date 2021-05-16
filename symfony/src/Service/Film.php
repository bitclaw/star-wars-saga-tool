<?php

// src/Service/Film.php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film as FilmEntity;

class Film
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create(array $film)
    {
        // may validate here later

        $entity = new FilmEntity();
        $entity
            ->setTitle($film['title'])
            ->setEpisodeId($film['episode_id'])
            ->setOpeningCrawl($film['opening_crawl'])
            ->setDirector($film['director'])
            ->setProducer($film['producer'])
            ->setReleaseDate($film['release_date'])
            ->setCharacters($film['characters'])
            ->setPlanets($film['planets'])
            ->setStarships($film['starships'])
            ->setVehicles($film['vehicles'])
            ->setSpecies($film['species'])
            ->setUrl($film['url'])
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
        ;

        $this->em->persist($entity);
        $this->em->flush();
    }
}
