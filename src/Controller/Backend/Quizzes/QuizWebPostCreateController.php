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

class QuizWebPostCreateController extends AbstractController
{
    public function __construct(private QuizCreator $quizCreator, private QuestionCreator $questionCreator, private AnswerCreator $answerCreator)
    {
    }

    #[Route('/quiz', name: 'quiz_web_post_create', methods: 'POST')]
    public function __invoke(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $this->quizCreator->__invoke(
            new CreateQuizRequest(
                $data['id'],
                $data['title']
            )
        );

        foreach ($data['questions'] as $question) {
            $this->questionCreator->__invoke(
                new CreateQuestionRequest(
                    $question['id'],
                    $data['id'],
                    $question['text']
                )
            );

            /*
            foreach ($question['answers'] as $answer) {
                $this->answerCreator->__invoke(
                    new CreateAnswerRequest(
                        $answer['id'],
                        $question['id'],
                        $answer['text'],
                        $answer['correct']
                    )
                );
            }
            */
        }

        return new Response('', Response::HTTP_CREATED);
    }
}
