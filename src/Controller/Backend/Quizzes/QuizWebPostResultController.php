<?php

namespace App\Controller\Backend\Quizzes;

use App\Quiz\Answers\Application\Create\AnswerCreator;
use App\Quiz\Answers\Application\Create\CreateAnswerRequest;
use App\Quiz\Questions\Application\Create\CreateQuestionRequest;
use App\Quiz\Questions\Application\Create\QuestionCreator;
use App\Quiz\Quizzes\Application\Create\CreateQuizRequest;
use App\Quiz\Quizzes\Application\Create\QuizCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QuizWebPostResultController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/quiz/{id}/result', name: 'quiz_web_post_result', methods: 'POST')]
    public function __invoke(Request $request): Response
    {
        dd($request->request->get('answerText-15aa6ca9-5279-4165-8470-9751979750cf-1'));
        $data = json_decode($request->getContent(), true);
        dd($data);


        return new Response('', Response::HTTP_CREATED);
    }
}
