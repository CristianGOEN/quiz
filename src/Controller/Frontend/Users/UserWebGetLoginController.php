<?php

namespace App\Controller\Frontend\Users;

use App\Shared\Domain\ValueObject\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserWebGetLoginController extends AbstractController
{
    #[Route('/login', name: 'user_web_get_login', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('security/login.html.twig', [
            'error' => '',
            'uuid' => Uuid::random()
        ]);
    }
}
