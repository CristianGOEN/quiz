<?php

declare(strict_types=1);

namespace App\Controller\Frontend\Quizzes;

use App\Quiz\Quizzes\Application\Find\QuizFinderAll;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class QuizWebGetListController extends AbstractController
{
    public function __construct(private QuizFinderAll $quizFinderAll)
    {
    }

    #[Route('/quizzes', name: 'quizzes_web_get_list', methods: 'GET')]
    public function index(): Response
    {
        $quizzes = $this->quizFinderAll->__invoke();

        return $this->render('quiz/list.html.twig', [
            'quizzes' => $quizzes
        ]);
    }
}