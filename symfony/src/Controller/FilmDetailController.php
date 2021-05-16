<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Film as FilmEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Swapi;
use App\Service\Film;

class FilmDetailController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/film-detail/{id}",defaults={"id" = 1}, name="film_detail")
     */
    public function index(Request $request)
    {
        return $this->render('film/detail.html.twig', [
            'detail' => '',
        ]);
    }
}
