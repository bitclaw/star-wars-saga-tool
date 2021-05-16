<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Film::class);
        $this->manager = $manager;
    }

    public function saveFilm(...$data)
    {
        $entity = new Film();
        $entity
            ->setTitle($data['title'])
            ->setEpisodeId($data['episode_id'])
            ->setOpeningCrawl($data['opening_crawl'])
            ->setDirector($data['director'])
            ->setProducer($data['producer'])
            ->setReleaseDate($data['producer'])
            ->setCharacters($data['producer'])
            ->setPlanets($data['producer'])
            ->setStarships($data['producer'])
            ->setVehicles($data['producer'])
            ->setSpecies($data['producer'])
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
        ;

        $this->manager->persist($entity);
        $this->manager->flush();
    }

//    public function count()
//    {
//        return $this->createQueryBuilder('f')
//            ->select('count(t.id)')
//            ->getQuery()
//            ->getSingleScalarResult();
//    }
}
