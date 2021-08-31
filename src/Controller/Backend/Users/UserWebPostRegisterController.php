<?php

namespace App\Controller\Backend\Users;

use App\Quiz\Users\Application\CreateUserRequest;
use App\Quiz\Users\Application\UserCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserWebPostRegisterController extends AbstractController
{
    public function __construct(private UserCreator $creator)
    {
    }

    #[Route('/register', name: 'user_web_post_register', methods: 'POST')]
    public function __invoke(Request $request): Response
    {
        $this->creator->__invoke(
            new CreateUserRequest(
                $request->get('id'),
                $request->get('name'),
                $request->get('email'),
                $request->get('password')
            )
        );

        return $this->render('security/success.html.twig');
    }
}
