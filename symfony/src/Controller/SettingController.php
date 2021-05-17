<?php

namespace App\Controller;

use App\Entity\Setting as SettingEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SettingController extends AbstractController
{
    /**
     * @Route("/setting", name="app_setting")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(SettingEntity::class);
        $settings = $repository->findAll();

        return $this->render('setting/index.html.twig', [
            'settings' => $settings,
        ]);
    }
}
