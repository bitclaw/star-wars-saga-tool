<?php

// src/Controller/FilmDetail.php
namespace App\Controller;

use App\Entity\Character as CharacterEntity;
use App\Service\Species;
use App\Service\Swapi;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CharacterDetailController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/character-detail/{id}",defaults={"id" = 1}, name="character_detail")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, Swapi $swapi, Species $speciesService)
    {
        $id = (int)$request->get('id');
        $repository = $entityManager->getRepository(CharacterEntity::class);
        $character = $repository->find($id);

        if (! $character->getSpecies()) {
            $speciesService->create($character);
        }

        return $this->render('character/detail.html.twig', [
            'character' => $character,
        ]);
    }
}
