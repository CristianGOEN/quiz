<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Infrastructure;

use App\Quiz\Answers\Domain\Answer;
use App\Quiz\Answers\Domain\AnswerId;
use App\Quiz\Answers\Domain\AnswerRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineAnswerRepository extends DoctrineRepository implements AnswerRepository
{
    public function save(Answer $answer): void
    {
        $this->entityManager()->persist($answer);
        $this->entityManager()->flush();
    }

    public function search(AnswerId $id): ?Answer
    {
        // TODO: Implement search() method.
    }

    public function update(Answer $answer): void
    {
        // TODO: Implement update() method.
    }

    public function delete(AnswerId $id): void
    {
        // TODO: Implement delete() method.
    }
}