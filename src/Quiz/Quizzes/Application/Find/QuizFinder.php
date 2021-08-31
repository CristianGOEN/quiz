<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Application\Find;

use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Quizzes\Domain\QuizNotExist;
use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Shared\Domain\Quizzes\QuizId;

final class QuizFinder
{
    public function __construct(private QuizRepository $repository)
    {
    }

    public function __invoke(QuizId $id): ?Quiz
    {

        $quiz = $this->repository->search($id);
        $this->ensureQuizExists($quiz);

        return $quiz;
    }

    private function ensureQuizExists(Quiz $quiz = null): void
    {
        if (null === $quiz) {
            throw new QuizNotExist();
        }
    }
}