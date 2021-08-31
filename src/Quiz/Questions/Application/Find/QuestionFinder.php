<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Application\Find;

use App\Quiz\Questions\Domain\Question;
use App\Quiz\Questions\Domain\QuestionNotExist;
use App\Quiz\Questions\Domain\QuestionRepository;
use App\Quiz\Shared\Domain\Questions\QuestionId;

final class QuestionFinder
{
    public function __construct(private QuestionRepository $repository)
    {
    }

    public function __invoke(QuestionId $id): ?Question
    {
        $question = $this->repository->search($id);

        $this->ensureQuestionExists($question);

        return $question;
    }

    private function ensureQuestionExists(Question $question = null): void
    {
        if (null === $question) {
            throw new QuestionNotExist();
        }
    }
}