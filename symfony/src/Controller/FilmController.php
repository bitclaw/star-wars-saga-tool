<?php

namespace App\Controller;

use App\Entity\Film as FilmEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Swapi;
use App\Service\Film;

class FilmController extends AbstractController
{
    const SWAPI_FILMS_ENDPOINT = 'https://swapi.dev/api/films/';
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/", name="app_homepage")
     */
    public function index(EntityManagerInterface $entityManager, Swapi $swapi, Film $filmService)
    {
        $repository = $entityManager->getRepository(FilmEntity::class);
        $filmCount = $repository->count([]);
        if ($filmCount === 0) {
            $films = $swapi->fetch(self::SWAPI_FILMS_ENDPOINT)['results'];
            $filmService->createMany($films);
        }

        $films = $repository->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }
}
