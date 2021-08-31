<?php

namespace App\Controller\Backend\Users;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserWebPostLoginController extends AbstractController
{
    #[Route('/login', name: 'user_web_post_login', methods: 'POST')]
    public function __invoke(Request $request): Response
    {
        return $this->render('security/success.html.twig');
    }
}
