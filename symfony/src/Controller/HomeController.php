<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Film;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Swapi;

class HomeController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/", name="app_homepage")
     */
    public function index(EntityManagerInterface $entityManager, Swapi $swapi)
    {
        $repository = $entityManager->getRepository(Film::class);
        $filmCount = $repository->count([]);
        $films = $swapi->fetchFilms()['results'];
//        if ($filmCount === 0) {
//            $films = $swapi->fetchFilms()['results'];
//            foreach ($films as $film) {
//                $repository->saveFilm($film);
//            }
//        } else {
//            $films = $repository->findAll();
//        }

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }
}
