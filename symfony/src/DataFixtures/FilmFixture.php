<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmFixture extends Fixture
{
    /**
     * @var \DateTime
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function load(ObjectManager $manager)
    {
        $entity = new Film();
        $entity->setTitle('A New Hope');
        $entity->setEpisodeId(4);
        $entity->setOpeningCrawl("It is a period of civil war.\r\nRebel spaceships, striking\r\nfrom a hidden base, have won\r\ntheir first victory against\r\nthe evil Galactic Empire.\r\n\r\nDuring the battle, Rebel\r\nspies managed to steal secret\r\nplans to the Empire's\r\nultimate weapon, the DEATH\r\nSTAR, an armored space\r\nstation with enough power\r\nto destroy an entire planet.\r\n\r\nPursued by the Empire's\r\nsinister agents, Princess\r\nLeia races home aboard her\r\nstarship, custodian of the\r\nstolen plans that can save her\r\npeople and restore\r\nfreedom to the galaxy....");
        $entity->setDirector('George Lucas');
        $entity->setProducer('Gary Kurtz, Rick McCallum');
        $entity->setReleaseDate('1977-05-25');
        $entity->setCharacters([
            "http://swapi.dev/api/people/1/",
            "http://swapi.dev/api/people/2/",
            "http://swapi.dev/api/people/3/",
            "http://swapi.dev/api/people/4/",
            "http://swapi.dev/api/people/5/",
            "http://swapi.dev/api/people/6/",
            "http://swapi.dev/api/people/7/",
            "http://swapi.dev/api/people/8/",
            "http://swapi.dev/api/people/9/",
            "http://swapi.dev/api/people/10/",
            "http://swapi.dev/api/people/12/",
            "http://swapi.dev/api/people/13/",
            "http://swapi.dev/api/people/14/",
            "http://swapi.dev/api/people/15/",
            "http://swapi.dev/api/people/16/",
            "http://swapi.dev/api/people/18/",
            "http://swapi.dev/api/people/19/",
            "http://swapi.dev/api/people/81/"
        ]);

        $entity->setPlanets([
            "http://swapi.dev/api/planets/1/",
            "http://swapi.dev/api/planets/2/",
            "http://swapi.dev/api/planets/3/"
        ]);

        $entity->setStarships([
            "http://swapi.dev/api/starships/2/",
            "http://swapi.dev/api/starships/3/",
            "http://swapi.dev/api/starships/5/",
            "http://swapi.dev/api/starships/9/",
            "http://swapi.dev/api/starships/10/",
            "http://swapi.dev/api/starships/11/",
            "http://swapi.dev/api/starships/12/",
            "http://swapi.dev/api/starships/13/"
        ]);

        $entity->setVehicles([
            "http://swapi.dev/api/vehicles/4/",
            "http://swapi.dev/api/vehicles/6/",
            "http://swapi.dev/api/vehicles/7/",
            "http://swapi.dev/api/vehicles/8/"
        ]);

        $entity->setSpecies([
            "http://swapi.dev/api/vehicles/4/",
            "http://swapi.dev/api/vehicles/6/",
            "http://swapi.dev/api/vehicles/7/",
            "http://swapi.dev/api/vehicles/8/"
        ]);

        $entity->setCreatedAt($this->date);
        $entity->setUpdatedAt($this->date);

        $manager->persist($entity);
        $manager->flush();
    }
}
