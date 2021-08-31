<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Application\Create;

use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Quizzes\Domain\QuizTitle;
use App\Quiz\Shared\Domain\Quizzes\QuizId;

final class QuizCreator
{
    public function __construct(private QuizRepository $repository)
    {
    }

    public function __invoke(CreateQuizRequest $request): void
    {
        $id = new QuizId($request->id());
        $title = new QuizTitle($request->title());

        $quiz = Quiz::create(
            $id,
            $title
        );

        $this->repository->save($quiz);
    }
}