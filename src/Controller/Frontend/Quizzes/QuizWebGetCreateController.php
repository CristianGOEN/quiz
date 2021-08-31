<?php

declare(strict_types=1);

namespace App\Controller\Frontend\Quizzes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class QuizWebGetCreateController extends AbstractController
{
    #[Route('/quiz', name: 'quiz_web_get_create', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('quiz/create.html.twig');
    }
}