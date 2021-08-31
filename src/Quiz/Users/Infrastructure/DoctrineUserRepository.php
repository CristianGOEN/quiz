<?php

declare(strict_types=1);

namespace App\Quiz\Users\Infrastructure;

use App\Quiz\Users\Domain\User;
use App\Quiz\Users\Domain\UserId;
use App\Quiz\Users\Domain\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineUserRepository implements UserRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function save(User $user): void
    {
        $this->entityManager()->persist($user);
        $this->entityManager()->flush();
    }

    public function search(UserId $id): ?User
    {
        // TODO: Implement search() method.
    }

    public function update(User $user): void
    {
        // TODO: Implement update() method.
    }

    public function delete(UserId $id): void
    {
        // TODO: Implement delete() method.
    }
}