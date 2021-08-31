<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Infrastructure;

use App\Quiz\Questions\Domain\Question;
use App\Quiz\Questions\Domain\QuestionRepository;
use App\Quiz\Questions\Domain\Questions;
use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineQuestionRepository extends DoctrineRepository implements QuestionRepository
{
    public function save(Question $question): void
    {
        $this->entityManager()->persist($question);
        $this->entityManager()->flush();
    }

    public function search(QuestionId $id): ?Question
    {
        return $this->repository(Question::class)->find($id);
    }

    public function update(Question $question): void
    {
        // TODO: Implement update() method.
    }

    public function delete(QuestionId $id): void
    {
        // TODO: Implement delete() method.
    }

    public function searchByQuizId(QuizId $id): ?Questions
    {
        $query = $this->repository(Question::class)->findBy(array('quizId' => $id));
        return new Questions($query);
    }
}