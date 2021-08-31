<?php

declare(strict_types=1);

namespace App\Quiz\Users\Application;

use App\Quiz\Users\Domain\User;
use App\Quiz\Users\Domain\UserEmail;
use App\Quiz\Users\Domain\UserId;
use App\Quiz\Users\Domain\UserName;
use App\Quiz\Users\Domain\UserPassword;
use App\Quiz\Users\Domain\UserRepository;

final class UserCreator
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(CreateUserRequest $request): void
    {
        $id = new UserId($request->id());
        $name = new UserName($request->name());
        $password = new UserPassword($request->password());
        $email = new UserEmail($request->email());

        $user = User::create(
            $id,
            $name,
            $email,
            $password
        );

        $this->repository->save($user);
    }
}