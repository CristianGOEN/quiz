<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Application\Find;

use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Quizzes\Domain\Quizzes;
use App\Quiz\Quizzes\Domain\QuizzesNotFound;

final class QuizFinderAll
{
    public function __construct(private QuizRepository $repository)
    {
    }

    public function __invoke(): array
    {
        $quizzes = $this->repository->searchAll();

        $this->ensureQuizzesAreFound($quizzes);

        $quizzesResponses = [];
        foreach ($quizzes->elements() as $quiz) {
            array_push($quizzesResponses, QuizResponseConverter::create($quiz)->toPrimitives());
        }

        return $quizzesResponses;
    }

    private function ensureQuizzesAreFound(Quizzes $quizzes = null): void
    {
        if (null === $quizzes) {
            throw new QuizzesNotFound();
        }
    }
}