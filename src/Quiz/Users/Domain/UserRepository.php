<?php

declare(strict_types=1);

namespace App\Quiz\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;
    public function search(UserId $id): ?User;
    public function update(User $user): void;
    public function delete(UserId $id): void;
}