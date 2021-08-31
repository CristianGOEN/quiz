<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Infrastructure;

use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Quizzes\Domain\Quizzes;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineQuizRepository extends DoctrineRepository implements QuizRepository
{
    public function save(Quiz $quiz): void
    {
        $this->entityManager()->persist($quiz);
        $this->entityManager()->flush();
    }

    public function search(QuizId $id): ?Quiz
    {
        return $this->repository(Quiz::class)->find($id);
    }

    public function searchAll(): ?Quizzes
    {
        $query = $this->repository(Quiz::class)->findAll();
        return new Quizzes($query);
    }

    public function update(Quiz $quiz): void
    {
        // TODO: Implement update() method.
    }

    public function delete(QuizId $id): void
    {
        // TODO: Implement delete() method.
    }


}