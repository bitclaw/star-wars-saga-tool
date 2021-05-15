<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Swapi;

class HomeController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/", name="app_homepage")
     */
    public function index(Swapi $swapi)
    {
        return $this->render('film/index.html.twig', [
            'films' => $swapi->fetchFilms()['results'],
        ]);
    }
}
