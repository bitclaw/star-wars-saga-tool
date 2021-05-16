<?php

// src/Service/Film.php
namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class Film
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create(\App\Entity\Film $film)
    {
        // may validate here later
        $this->em->persist($film);
        $this->em->flush();
    }
}
