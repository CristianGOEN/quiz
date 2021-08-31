<?php

namespace App\Controller\Frontend\Users;

use App\Shared\Domain\ValueObject\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserWebGetRegisterController extends AbstractController
{
    #[Route('/register', name: 'user_web_get_register', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('security/register.html.twig', [
            'error' => '',
            'uuid' => Uuid::random()
        ]);

    }
}
