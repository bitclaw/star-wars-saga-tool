<?php

namespace App\EventSubscriber;

use App\Entity\Setting;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class User implements EventSubscriberInterface
{
    private $em;
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(EntityManagerInterface $em, MailerInterface $mailer)
    {
        $this->em = $em;
        $this->mailer = $mailer;
    }

    public function onLoginSuccess(LoginSuccessEvent $event)
    {
        $user = $event->getUser();
        $setting = $this->em->getRepository('App\Entity\Setting')->findOneBy([
            'name' => 'email',
        ]);
        $this->sendEmail($user, $setting);
    }

    public static function getSubscribedEvents()
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess'
        ];
    }

    private function sendEmail(UserInterface $user, Setting $setting): void
    {
        $email = (new Email())
            ->from($setting->getValue())
            ->to($user->getEmail())
            ->priority(Email::PRIORITY_HIGH)
            ->subject('User logged in...')
            ->text('User logged in successfully!')
            ->html('<p>User logged in successfully!</p>');

        $this->mailer->send($email);
    }
}
