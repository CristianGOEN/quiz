<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Application\Find;

use App\Quiz\Questions\Domain\QuestionRepository;
use App\Quiz\Questions\Domain\Questions;
use App\Quiz\Quizzes\Domain\QuizzesNotFound;
use App\Quiz\Shared\Domain\Quizzes\QuizId;

final class QuestionFinderByQuizId
{
    public function __construct(private QuestionRepository $repository)
    {
    }

    public function __invoke(QuizId $id):? Questions
    {
        $questions = $this->repository->searchByQuizId($id);

        $this->ensureQuestionsAreFound($questions);

        return $questions;
    }

    private function ensureQuestionsAreFound(Questions $questions = null): void
    {
        if (null === $questions) {
            throw new QuizzesNotFound();
        }
    }
}