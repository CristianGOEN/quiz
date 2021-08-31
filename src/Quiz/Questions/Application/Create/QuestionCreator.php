<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Application\Create;

use App\Quiz\Questions\Domain\Question;
use App\Quiz\Questions\Domain\QuestionRepository;
use App\Quiz\Questions\Domain\QuestionText;
use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Quiz\Shared\Domain\Quizzes\QuizId;

final class QuestionCreator
{
    public function __construct(private QuestionRepository $repository, private QuizRepository $quizRepository)
    {
    }

    public function __invoke(CreateQuestionRequest $request): void
    {
        $id = new QuestionId($request->id());
        $quizId = new QuizId($request->quizId());
        $text = new QuestionText($request->text());

        $quiz = $this->quizRepository->search($quizId);

        $question = Question::create(
            $id,
            $text,
            $quiz
        );

        $this->repository->save($question);
    }
}