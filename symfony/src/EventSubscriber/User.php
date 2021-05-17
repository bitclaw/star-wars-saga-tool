<?php

namespace App\EventSubscriber;

use App\Entity\Setting as SettingEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class User implements EventSubscriberInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onLoginSuccess(LoginSuccessEvent $event)
    {
        $user = $event->getUser();
        $repository = $this->em->getRepository(SettingEntity::class);
        $setting = $this->em->getRepository('App\Entity\Setting')->findOneBy([
            'name' => 'email',
        ]);

        $this->em->flush();
    }

    public static function getSubscribedEvents()
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess'
        ];
    }
}
