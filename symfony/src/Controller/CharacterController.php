<?php

namespace App\Controller;

use App\Entity\Character as CharacterEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Swapi;
use App\Service\Character;

class CharacterController extends AbstractController
{
    const SWAPI_ENDPOINT = 'https://swapi.dev/api/people/';

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/character", name="character")
     */
    public function index(EntityManagerInterface $entityManager, Swapi $swapi, Character $characterService)
    {
        $repository = $entityManager->getRepository(CharacterEntity::class);
        $count = $repository->count([]);
        if ($count === 0) {
            $people = $swapi->fetch(self::SWAPI_ENDPOINT)['results'];
            $characterService->createMany($people);
        }

        $characters = $repository->findAll();

        return $this->render('character/index.html.twig', [
            'characters' => $characters,
        ]);
    }
}
