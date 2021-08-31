<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Infrastructure;

use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Quizzes\Domain\QuizRepository;
use App\Quiz\Quizzes\Domain\Quizzes;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineQuizRepository implements QuizRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function save(Quiz $quiz): void
    {
        $this->entityManager()->persist($quiz);
        $this->entityManager()->flush();
    }

    public function search(QuizId $id): ?Quiz
    {
        return $this->entityManager->getRepository(Quiz::class)->find($id);
    }

    public function searchAll(): ?Quizzes
    {
        $query = $this->entityManager->getRepository(Quiz::class)->findAll();
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