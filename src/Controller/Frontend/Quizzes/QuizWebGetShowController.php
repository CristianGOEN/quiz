<?php

declare(strict_types=1);

namespace App\Controller\Frontend\Quizzes;

use App\Quiz\Quizzes\Application\Find\QuizFinder;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class QuizWebGetShowController extends AbstractController
{
    public function __construct(private QuizFinder $quizFinder)
    {
    }

    #[Route('/quiz/{id}', name: 'quiz_web_get_show', methods: 'GET')]
    public function index(string $id): Response
    {
        $quiz = $this->quizFinder->__invoke(new QuizId($id));

        return $this->render('quiz/show.html.twig', [
            'quiz' => $quiz
        ]);
    }
}